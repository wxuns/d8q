<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Qcloud\Cos\Client;
use Validator;
use Illuminate\Support\Facades\DB;
use \Firebase\JWT\JWT;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;
use App\Mail\BuyBalance;
use App\Mail\DelBlance;

class AdminController extends Controller
{
    public function adminDownload(Request $request){
        return $this->ossDownload($request->key);
    }
    public function index(){
        //待处理订单
        $sign = DB::table('sign')->where('certid',null)->count();
        //待处理充值
        $blancecard = DB::table('blancecard')->where('status',0)->count();
        //总流水
        $order = DB::table('order')->sum('price');
        $blance = DB::table('blance')->sum('blance');
        //订单个数
        $todyorder = DB::table('order')->where('time','>',strtotime(date("Y-m-d",time())))->count();
        //用户总数
        $user = DB::table('users')->count();
        //新增用户数
        $newuser = DB::table('users')->where('time','>',strtotime(date("Y-m-d",time())))->count();
        //已过期app数量
        $expire = DB::table('sign')
            ->join('plan','plan.id','=','sign.planid')
            ->join('order','order.id','=','sign.subid')
            ->select('sign.id','order.time','plan.month')->get();
        $out = [];
        $seven = [];

        foreach ($expire as $key=>$v){
            $ti = $v->time+$v->month*30*24*60*60;
            if ($ti - time()<0){
                //查看续费
                $renew = DB::table('renew')
                    ->where('signid',$v->id)
                    ->join('plan','plan.id','=','renew.planid')
                    ->select('renew.time','plan.month')
                    ->get();
                if ($renew){
                    foreach ($renew as $kk=>$value){
                        $ti += $value->month*30*24*60*60;
                    }
                    if ($ti - time()<0){
                        $out[] = $v;
                    }
                    if ($ti - time()<604800 && $ti - time()>0){
                        $seven[] = $v;
                    }
                }else{
                    $out[] = $v;
                }
            }else{
                if ($ti - time()<604800 && $ti - time()>0){
                    $seven[] = $v;
                }
            }
        }
        $count['sign'] = $sign;
        $count['blancecard'] = $blancecard;
        $count['order'] = $order;
        $count['blance'] = $blance;
        $count['todyorder'] = $todyorder;
        $count['user'] = $user;
        $count['newuser'] = $newuser;
        $count['out'] = count($out);
        $count['seven'] = count($seven);
        return view('admin/index',['count'=>$count]);
    }
    public function checkemail(Request $request){
        if($request->email){
            if (DB::table('users')->where('email',$request->email)->exists()){
                return ['code'=>0,'message'=>'用户存在'];
            }
        }
    }
    public function app(){
        return view('admin/app');
    }

    /**
     * 获得应用
     * @param Request $request
     * @return array
     */
    public function getapp(Request $request){
        $page = $request->page;
        $limit = $request->limit;
        $key = $request->key;
        $day = $request->day;
        $data = DB::table('sign')
            ->join('plan','plan.id','=','sign.planid')
            ->join('order','order.id','=','sign.subid')
            ->join('users','users.id','=','sign.userid')
            ->leftJoin('plantype','plantype.id','=','plan.plantypeid')
            ->select('sign.*','plantype.name as planname','plan.month','order.time','order.isclosed','users.name')
            ->skip(($page-1)*$limit)->take($limit)
            ->where('filename','like','%'.$key.'%')
            ->orderBy('id','desc')
            ->orderBy('certid','asc')
            ->get();
        foreach ($data as $key=>$v){
            $ti = $v->time+$v->month*2592000;
            $renew = DB::table('renew')
                ->where('signid',$v->id)
                ->join('plan','plan.id','=','renew.planid')
                ->select('renew.time','plan.month')
                ->get();
            if ($renew){
                foreach ($renew as $kk=>$value){
                    $ti += $value->month*30*24*60*60;
                }
            }
            $data[$key]->exp = intval(($ti-time())/86400);
            if ($day){
                $res = [];
                if ($data[$key]->exp < $day){
                    $res[] = $data[$key];
                }
            }
        }
        if ($day){
            $data = $res;
        }
        return [
            'code'=>0,
            'msg'=>0,
            'count'=>DB::table('sign')->whereNull('planid')->count(),
            'data'=>$data
        ];
    }

    /**
     * 添加应用
     * @param Request $request
     * @return array|bool
     */
    public function addapp(Request $request){
        if ($request->input()){
            $rule = [
                'email'=>'required|email',
                'qq'=>'required|numeric',
                'planid'=>'required|numeric',
                'fliename'=>'required',
                'sign'=>'required'
            ];
            $validator = Validator::make($request->input(),$rule);
            if($validator->errors()->first('sign')){
                return ['code'=>5,'message'=>'请上传应用'];
            }

            if($validator->errors()->first()){
                return false;
            }
            $user = DB::table('users')->where('email',$request->email)->first();
            if (!$user){
                return ['code'=>5,'message'=>'用户不存在'];
            }

            $decoded = JWT::decode($request->sign, "fbkj", array('HS256'));
            if (!$decoded || session('user_id') != $decoded->user_id){
                return false;
            }
            $sign_id = $decoded->sign_id;
            //生成订单
            $orderid = DB::table('order')->insertGetId([
                'planid'=>$request->planid,
                'userid'=>$user->id,
                'signid'=>$sign_id,
                'tradeno'=>'admin',
                'isclosed'=>'1',
                'time'=>time()
            ]);
            DB::table('notice')
                ->insert(['user_id'=>$user->id,
                    'sign_id'=>$sign_id,
                    'type'=>2,
                    'message'=>'订单已完成',
                    'time'=>time(),
                ]);
            //修改证书状态
            DB::table('cert')
                ->where('id',$request->certid)
                ->update(['status'=>1]);
            //添加证书记录
            DB::table('cretlog')->insert([
                'user_id'=>$user->id,
                'cert_id'=>$request->certid,
                'sign_id'=>$sign_id,
                'time'=>time()]);
            $res = DB::table('sign')->where('id',$sign_id)->update([
                'userid'=>$user->id,
                'filename'=>$request->fliename,
                'qq'=>$request->qq,
                'email'=>$request->email,
                'remarks'=>$request->remarks,
                'planid'=>$request->planid,
                'certid'=>$request->certid,
                'subid'=>$orderid,
            ]);
            //发送消息通知
            Mail::to($request->email)->later(10, new OrderShipped());
            if ($res)
                return ['code'=>0,'message'=>'应用添加成功'];
            else
                return ['code'=>5,'message'=>'应用添加失败'];
        }else{
            $plan = DB::table('plan')
                ->join('plantype','plantype.id','=','plan.plantypeid')
                ->select('plan.id','plantype.name','plan.month')
                ->get();
            $cert = DB::table('cert')
                ->where('status','0')
                ->get();
            return view('admin/addapp',['plan'=>$plan,'cert'=>$cert]);
        }
    }

    /**
     * 修改应用
     * @param Request $request
     * @return array|bool
     */
    public function changeapp(Request $request){
        $id = $request->id;
        if ($request->input()){
            $rule = [
                'email'=>'required|email',
                'qq'=>'required|numeric',
                'planid'=>'required|numeric',
                'fliename'=>'required',
                'sign'=>'required'
            ];
            $validator = Validator::make($request->input(),$rule);
            if($validator->errors()->first('sign')){
                return ['code'=>5,'message'=>'请上传应用'];
            }

            if($validator->errors()->first()){
                return false;
            }

            $decoded = JWT::decode($request->sign, "fbkj", array('HS256'));
            if (!$decoded || session('user_id') != $decoded->user_id){
                return false;
            }
            $sign_id = $decoded->sign_id;

            $sign = DB::table('sign')
                ->where('id',$sign_id)
                ->first();
            $userid = $sign->userid;
            //更新订单
            DB::table('order')
                ->where('signid',$sign_id)->update([
                'isclosed'=>'1'
            ]);
            DB::table('notice')
                ->insert(['user_id'=>$userid,
                    'sign_id'=>$sign_id,
                    'type'=>2,
                    'message'=>'订单已完成',
                    'time'=>time(),
                ]);
            //修改证书状态
            DB::table('cert')
                ->where('id',$request->certid)
                ->update(['status'=>1]);
            //添加证书记录
            DB::table('cretlog')->insert([
                'user_id'=>$userid,
                'cert_id'=>$request->certid,
                'sign_id'=>$sign_id,
                'time'=>time()]);
            $res = DB::table('sign')->where('id',$sign_id)->update([
                'filename'=>$request->fliename,
                'qq'=>$request->qq,
                'email'=>$request->email,
                'remarks'=>$request->remarks,
                'planid'=>$request->planid,
                'certid'=>$request->certid,
            ]);
            //发送消息通知
            Mail::to($request->email)->later(10, new OrderShipped());
            if ($res)
                return ['code'=>0,'message'=>'应用修改成功'];
            else
                return ['code'=>5,'message'=>'应用修改失败'];
        }else{
            $plan = DB::table('plan')
                ->join('plantype','plantype.id','=','plan.plantypeid')
                ->select('plan.id','plantype.name','plan.month')
                ->get();
            $cert = DB::table('cert')
                ->where('status','0')
                ->get();
            $sign = DB::table('sign')
                ->join('users','users.id','=','sign.userid')
                ->join('plan','plan.id','=','sign.planid')
                ->join('order','order.id','=','sign.subid')
                ->leftJoin('plantype','plantype.id','=','plan.plantypeid')
                ->where('sign.id',$id)
                ->select('sign.*','users.name','plantype.name as planname','order.isclosed','order.price')
                ->first();
            return view('admin/addapp',['plan'=>$plan,'cert'=>$cert,'sign'=>$sign]);
        }
    }

    /**
     * 删除应用
     * @param $id
     * @return array
     */
    public function delapp($id){
        $sign = DB::table('sign')
            ->where('id',$id)
            ->first();
        if ($this->ossDelete($sign->cospath)&&DB::table('sign')->delete($id)){
            return ['code'=>0,'message'=>'删除成功'];
        }
    }
    /**
     * 证书管理
     * @return mixed
     */
    public function cert(){
        return view('admin/cert');
    }

    /**
     * 获得证书
     * @param Request $request
     * @return array
     */
    public function getcert(Request $request){
        $page = $request->page;
        $limit = $request->limit;
        $data = DB::table('cert')
            ->skip(($page-1)*$limit)->take($limit)
            ->orderBy('id','desc')
            ->get();
        foreach ($data as $key=>$value){
            $data[$key]->time = date('Y-m-d H:i:s',$value->time);
            $data[$key]->status = $value->status?'已使用':'可用';
        }
        return [
            'code'=>0,
            'msg'=>0,
            'count'=>DB::table('cert')->count(),
            'data'=>$data
        ];
    }

    /**
     * 添加证书
     * @param Request $request
     * @return array|bool
     */
    public function addcert(Request $request){
        if ($request->input()){
            $rule = [
                'name'=>'required|min:5',
                'time'=>'required'
            ];
            $validator = Validator::make($request->input(),$rule);
            if($validator->errors()->first()){
                return false;
            }
            $res = DB::table('cert')->insert(['name'=>$request->name,'time'=>strtotime($request->time)]);

            if ($res)
                return ['code'=>0,'message'=>'证书添加成功'];
            else
                return ['code'=>5,'message'=>'证书添加失败'];
        }else{
            return view('admin/addcert');
        }
    }

    /**
     * 修改证书
     * @param Request $request
     * @param $id
     * @return array|bool|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function changecert(Request $request,$id){
        if ($request->input()){
            $rule = [
                'name'=>'required|min:5',
                'time'=>'required'
            ];
            $validator = Validator::make($request->input(),$rule);
            if($validator->errors()->first()){
                return false;
            }
            $res = DB::table('cert')->where('id',$id)->update(['name'=>$request->name,'time'=>strtotime($request->time)]);
            if ($res)
                return ['code'=>0,'message'=>'证书添加成功'];
            else
                return ['code'=>5,'message'=>'证书添加失败'];
        }else{
            $cert = DB::table('cert')->where('id',$id)->first();
            return view('admin/addcert',['cert'=>$cert]);
        }
    }

    /**
     * 删除证书
     * @param $id
     * @return array
     */
    public function delcert($id){
        if (DB::table('cert')->delete($id)){
            return ['code'=>0,'message'=>'删除成功'];
        }
    }
    public function plan(){
        return view('admin/plan');
    }
    public function planGet(){
        $data = DB::table('plan')
            ->join('plantype','plantype.id','=','plan.plantypeid')
            ->select('plan.id','plan.month','plan.price','plan.remark','plantype.name','plantype.info')
            ->get();
        return [
            'code'=>0,
            'msg'=>0,
            'count'=>DB::table('plan')->count(),
            'data'=>$data
        ];
    }

    /**
     * 添加套餐
     * @param Request $request
     * @return array|bool|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function planAdd(Request $request){
        if ($request->input()){
            if ($request->plantypeid){
                $rule = [
                    'plantypeid'=>'required|numeric',
                    'month'=>'required|numeric',
                    'price'=>'required|numeric',
                ];
            }else{
                $rule = [
                    'name'=>'required|min:2',
                    'info'=>'required',
                    'month'=>'required|numeric',
                    'price'=>'required|numeric',
                ];
            }
            $validator = Validator::make($request->input(),$rule);
            if($validator->errors()->first()){
                return false;
            }
            if ($request->name) {
                $typeid = DB::table('plantype')->insertGetId(['name'=>$request->name,'info'=>$request->info]);
            }else
                $typeid = $request->plantypeid;

            $res = DB::table('plan')->insert(['plantypeid'=>$typeid,'month'=>$request->month,'price'=>$request->price,'remark'=>$request->remark]);
            if ($res)
                return ['code'=>0,'message'=>'套餐添加成功'];
            else
                return ['code'=>5,'message'=>'套餐添加失败'];
        }else{
            $type = DB::table('plantype')->get();
            return view('admin/planadd',['type'=>$type]);
        }
    }

    /**
     * 修改套餐
     * @param Request $request
     * @param $id
     * @return array|bool
     */
    public function changeplan(Request $request,$id){
        if ($request->input()){
            $rule = [
                'plantypeid'=>'required|numeric',
                'month'=>'required|numeric',
                'price'=>'required|numeric',
            ];
            $validator = Validator::make($request->input(),$rule);
            if($validator->errors()->first()){
                return false;
            }
            $res = DB::table('plan')->where('id',$id)->update([
                'plantypeid'=>$request->plantypeid,
                'month'=>$request->month,
                'price'=>$request->price,
                'remark'=>$request->remark
            ]);
            if ($res)
                return ['code'=>0,'message'=>'证书添加成功'];
            else
                return ['code'=>5,'message'=>'证书添加失败'];
        }else{
            $type = DB::table('plantype')->get();
            $plan = DB::table('plan')
                ->join('plantype','plantype.id','=','plan.plantypeid')
                ->where('plan.id',$id)
                ->select('plan.id','plan.month','plan.price','plan.remark','plantype.id as pid','plantype.info')
                ->first();

            return view('admin/changeplan',['type'=>$type,'plan'=>$plan]);
        }
    }

    public function delplan($id){
        if (DB::table('plan')->delete($id)){
            return ['code'=>0,'message'=>'删除成功'];
        }
    }
    public function user(){
        return view('admin/user');
    }

    /**
     * 获取用户
     * @param Request $request
     * @return array
     */
    public function getuser(Request $request){
        $page = $request->page;
        $limit = $request->limit;
        $key = $request->key;
        $time = $request->time?strtotime(date('Y-m-d')):0;
        if (session('user_role')==1){
            $data = DB::table('users')
                ->skip(($page-1)*$limit)->take($limit)
                ->orderBy('id','desc')
                ->where('role','2')
                ->where('time','>',$time)
                ->where('name','like','%'.$key.'%')
                ->get();
        }else if (session('user_role')==0){
            $data = DB::table('users')
                ->skip(($page-1)*$limit)->take($limit)
                ->orderBy('id','desc')
                ->where('name','like','%'.$key.'%')
                ->where('time','>',$time)
                ->get();
        }

        return [
            'code'=>0,
            'msg'=>0,
            'count'=>DB::table('users')
                ->where('role','2')->count(),
            'data'=>$data
        ];
    }

    /**
     * 添加用户
     * @param Request $request
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adduser(Request $request){
        if ($request->input()){
            $name = $request->name;
            $email = $request->email;
            $password = $request->password;
            preg_match('/^\w[-\w.+]*@([A-Za-z0-9][-A-Za-z0-9]+\.)+[A-Za-z]{2,14}$/', $email,$match);
            if (strlen($name)<5
                ||empty($match)
                ||strlen($password)<6
                ||DB::table('users')->where('email',$email)->exists()){
                return ['code'=>1,'message'=>'用户注册信息有误'];
            }
            if ($id = DB::table('users')->insertGetId([
                'name'=>$name,
                'email'=>$email,
                'mobile'=>$request->mobile,
                'status'=>$request->status == 'on'?'1':'0',
                'password'=>$password,
                'discount'=>$request->discount
            ])){
                return ['code'=>0,'message'=>'注册成功'];
            }
        }else{
            return view('admin/adduser');
        }
    }

    /**
     * 修改用户
     * @param Request $request
     * @param $id
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function changeuser(Request $request,$id){
        if ($request->input()){
            $name = $request->name;
            $email = $request->email;
            $password = $request->password;
            preg_match('/^\w[-\w.+]*@([A-Za-z0-9][-A-Za-z0-9]+\.)+[A-Za-z]{2,14}$/', $email,$match);
            if (strlen($name)<5
                ||empty($match)
                ||strlen($password)<6){
                return ['code'=>1,'message'=>'用户注册信息有误'];
            }
            $data = [
                'name'=>$name,
                'email'=>$email,
                'mobile'=>$request->mobile,
                'status'=>($request->status == 'on')?'1':'0',
                'password'=>$password,
                'discount'=>$request->discount
            ];
            if (DB::table('users')->where('id',$id)->update($data)){
                return ['code'=>0,'message'=>'修改成功'];
            }else{
                return ['code'=>1,'message'=>'未作修改'];
            }
        }else{
            $user = DB::table('users')->where('id',$id)->first();
            return view('admin/adduser',['user'=>$user]);
        }
    }

    /**
     * 修改role
     * @param Request $request
     * @param $id
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function changerole(Request $request,$id){
        if ($request->input()){
            $role = $request->role;
            if (DB::table('users')->where('id',$id)->update(['role'=>$role])){
                return ['code'=>0,'message'=>'修改成功'];
            }else{
                return ['code'=>1,'message'=>'未作修改'];
            }
        }else{
            return view('admin/changerole',[
                'role'=>DB::table('users')->where('id',$id)->value('role')]);
        }
    }
    public function recharge(Request $request){
        return view('admin/recharge');
    }
    /**
     * 获取用户
     * @param Request $request
     * @return array
     */
    public function getrecharge(Request $request){
        $page = $request->page;
        $limit = $request->limit;

        $data = DB::table('blancecard')
            ->skip(($page-1)*$limit)->take($limit)
            ->join('users','users.id','=','blancecard.user_id')
            ->orderBy('blancecard.id','desc')
            ->select('users.name','blancecard.*')
            ->get();

        return [
            'code'=>0,
            'msg'=>0,
            'count'=>DB::table('users')
                ->where('role','2')->count(),
            'data'=>$data
        ];
    }

    /**
     * 审核转账
     * @param Request $request
     * @param $id
     * @return array
     */
    public function addbalance(Request $request,$id){
        if ($request->input()){
            $blancecard = DB::table('blancecard')->where('id',$id)->first();
            if($blancecard){
                $user_id = $blancecard->user_id;
                DB::table('blance')->where('user_id',$user_id)->increment('blance',$blancecard->quantity);
                DB::table('notice')
                    ->insert(['user_id'=>$user_id,
                        'sign_id'=>0,
                        'type'=>3,
                        'message'=>'充值成功',
                        'time'=>time(),
                    ]);
                DB::table('blancecard')->where('id',$id)->update(['status'=>1]);
                //发送邮件
                $email = DB::table('users')
                    ->where('id',$user_id)
                    ->value('email');

                //发送邮件
                Mail::to($email)->later(10, new BuyBalance());
                return ['code'=>0,'message'=>'充值成功'];
            }
        }
    }

    /**
     * 删除充值
     * @param $id
     * @return array
     */
    public function delbalance($id){
        $blancecard = DB::table('blancecard')->where('id',$id)->first();
        if($blancecard){
            DB::table('blancecard')->delete($id);
            //发送邮件
            $email = DB::table('users')
                ->where('id',$blancecard->user_id)
                ->value('email');

            //发送邮件
            Mail::to($email)->later(10, new DelBlance());
            return ['code'=>0,'message'=>'充值已撤销'];
        }
    }
    public function site(Request $request){
        if ($request->env){
            file_put_contents('/www/d8q/.env',$request->env);
            return ['code'=>0,'message'=>'保存成功'];
        }
        $env = file_get_contents('/www/d8q/.env');
        return view('admin/site',['env'=>$env]);
    }
}
