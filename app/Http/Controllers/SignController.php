<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Validator;
use DB;
use \Firebase\JWT\JWT;
use App\Mail\UpdateSign;

class SignController extends Controller
{
    public function upload(){

        return view('sign/upload');
    }

    /**
     * 上传软件api
     * @param Request $request
     * @return bool
     */
    public function uploadApi(Request $request){
        //表单验证
        $validator = Validator::make($request->all(),[
            'file'=>'max:'.env('APP_MAX')]);
        $file = $request->file;
        $ext = $file->getClientOriginalExtension();
        $list = explode(',',env('extension'));//后缀检测
        if($validator->errors()->first()||!in_array($ext,$list)){
            return false;
        }
        //上传文件
        $key = '/application/' . date('Y/m/') . md5(time()) . '.' . $ext;
        $local_path = $file->getRealPath();//服务器临时存放地址
        $result = $this->ossUpload($key,$local_path);
        if ($result){
            //上传成功写库
            if ($sign_id = $request->key){
                //修改
                $data = [
                    'cospath'=>$result['ObjectURL'],
                ];
                DB::table('sign')->where('id',$sign_id)->update($data);
                $this->ossDelete($result['ObjectURL']);
            }else{
                $data = [
                    'userid'=>session('user_id'),
                    'filename'=>$file->getClientOriginalName(),
                    'cospath'=>$result['ObjectURL'],
                ];
                $sign_id = DB::table('sign')->insertGetId($data);
            }

            $key = "fbkj";
            $jwt = JWT::encode(['sign_id'=>$sign_id,'user_id'=>session('user_id')], $key);
            return [
                'code'=>0,
                'msg'=>"上传成功",
                'data'=>['id'=>$jwt]
            ];
        }else{
            return [
                'code'=>3,
                'success'=>0,
                'message'=>'上传失败'
            ];
        }
    }

    /**
     * ②填写信息
     * @param $key
     * @return bool
     */
    public function makeUpload($key){
        $decoded = JWT::decode($key, "fbkj", array('HS256'));
        if (!$decoded || session('user_id') != $decoded->user_id){
            return false;
        }
        $appname = DB::table('sign')->where('id',$decoded->sign_id)->value('filename');
        return view('sign/make2',['appname'=>$appname,'token'=>$key]);
    }

    /**
     * 异步保存填写信息
     * @param Request $request
     * @return array|bool
     */
    public function info(Request $request){
        $validator = Validator::make($request->input(),[
            'qq'=>'numeric|min:5',
            'email'=>'email',
            'id'=>'required']);
        if($validator->errors()->first()){
            return false;
        }
        $id = JWT::decode($request->id, "fbkj", array('HS256'));
        if (!$id || session('user_id') != $id->user_id){
            return false;
        }
        if (DB::table('sign')->where('id',$id->sign_id)->update([
            'qq'=>$request->qq,
            'email'=>$request->email,
            'remarks'=>$request->remark
        ])){
            return ['code'=>0,'message'=>'success'];
        }else{
            return ['code'=>4,'message'=>'完善信息失败'];
        }
    }

    /**
     * 选择套餐
     * @param $key
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function plan($key){
        $decoded = JWT::decode($key, "fbkj", array('HS256'));
        if (!$decoded || session('user_id') != $decoded->user_id){
            return false;
        }
        $type = DB::table('plantype')->get();
        $plan = DB::table('plan')
            ->orderBy('month','asc')
            ->get();
        foreach ($type as $k=>$v){
            foreach ($plan as $keys=>$value){
                if ($value->plantypeid == $v->id){
                    $type[$k]->plan[$keys] = $value;
                }
            }
        }
        $blance = DB::table('blance')
            ->where(['user_id'=>session('user_id')
            ])->value('blance');
        $discount = DB::table('users')->where('id',session('user_id'))->value('discount');
        return view('sign/plan',['type'=>$type,'plan'=>$type,'token'=>$key,'discount'=>$discount,'blance'=>$blance]);
    }

    /**
     * 支付成功等待
     * @param $key
     * @return mixed
     */
    public function wait($key){
        $decoded = JWT::decode($key, "fbkj", array('HS256'));
        if ($decoded || session('user_id') == $decoded->user_id){
            $sign_id = $decoded->sign_id;
            $time = DB::table('order')->where('signid',$sign_id)->value('time');
            return view('sign/wait',['time'=>date('Y-m-d',$time)]);
        }
    }

    /**
     * 展示页面
     * @param $key
     * @return mixed
     */
    public function down($key){
        $decoded = JWT::decode($key, "fbkj", array('HS256'));
        if ($decoded || session('user_id') == $decoded->user_id){
            $sign_id = $decoded->sign_id;
            $sign = DB::table('sign')
                ->join('plan','plan.id','=','sign.planid')
                ->join('cert','cert.id','=','sign.certid')
                ->join('order','order.id','=','sign.subid')
                ->leftJoin('plantype','plantype.id','=','plan.plantypeid')
                ->select(
                    'sign.filename',
                    'sign.cospath',
                    'plantype.name as planname',
                    'cert.name as certname',
                    'order.time',
                    'plan.month')
                ->where('sign.id',$sign_id)
                ->first();
            $sign->cospath = $this->ossDownload($sign->cospath);
            //获取签名记录
            $cretlog = DB::table('cretlog')
                ->where('sign_id',$sign_id)
                ->join('cert','cert.id','=','cretlog.cert_id')
                ->select('cert.name','cretlog.time')
                ->get();
            return view('sign/down',['sign'=>$sign,'cretlog'=>$cretlog,'key'=>$key]);
        }
    }

    /**
     * 检测支付状态
     * @param $key
     * @return array
     */
    public function checkpay($key){
        $decoded = JWT::decode($key, "fbkj", array('HS256'));
        if ($decoded || session('user_id') == $decoded->user_id){
            $sign_id = $decoded->sign_id;
            $ex = DB::table('order')->where('signid',$sign_id)->exists();
            if ($ex){
                return ['code'=>0,'message'=>'订单已成功。。'];
            }
        }
    }

    public function lists(){
        return view('sign/list');
    }
    public function getlists(Request $request){
        $page = $request->page;
        $limit = $request->limit;
        $key = $request->key;
        $user_id = session('user_id');
        $data = DB::table('cretlog')
            ->where('user_id',$user_id)
            ->skip(($page-1)*$limit)->take($limit)
            ->join('cert','cert.id','=','cretlog.cert_id')
            ->join('sign','sign.id','=','cretlog.sign_id')
            ->join('plan','plan.id','=','sign.planid')
            ->leftJoin('plantype','plantype.id','=','plan.plantypeid')
            ->select('cert.name','cretlog.id as logid','cert.time','sign.id','sign.filename','sign.cospath','plantype.name as planname')
            ->where('filename','like','%'.$key.'%')
            ->get();
        foreach ($data as $k=>$v){
            $data[$k]->cospath = $this->ossDownload($v->cospath);
            $data[$k]->time = date('Y-m-d H:i:s',$v->time);
            $key = "fbkj";
            $data[$k]->key = JWT::encode(['sign_id'=>$v->id,'user_id'=>session('user_id')], $key);
        }
        return [
            'code'=>0,
            'msg'=>0,
            'count'=>DB::table('cretlog')
                ->where('user_id',$user_id)->count(),
            'data'=>$data
        ];
    }
    public function update($key){
        return view('sign/update',['key'=>$key]);
    }
    public function delcert(Request $request,$key){
        $user_id = session('user_id');
        if (!DB::table('users')->where(['id'=>$user_id,'password'=>$request->password])->exists()){
            return ['code'=>6,'message'=>'信息不准确，删除失败'];
        }
        if (DB::table('cretlog')->delete($key)){
            return ['code'=>0,'message'=>'删除成功'];
        }
    }
    /**
     * 套餐更新
     * @param Request $request
     * @param $key
     * @return array|bool
     */
    public function updateApi(Request $request,$key){
        //表单验证
        $validator = Validator::make($request->all(),[
            'file'=>'max:'.env('APP_MAX')]);
        $decoded = JWT::decode($key, "fbkj", array('HS256'));
        $user_id = session('user_id');
        if (!$decoded || $user_id != $decoded->user_id){
            return false;
        }
        $file = $request->file;
        $ext = $file->getClientOriginalExtension();
        $list = explode(',',env('extension'));//后缀检测
        if($validator->errors()->first()||!in_array($ext,$list)){
            return false;
        }
        //上传文件
        $key = '/application/' . date('Y/m/') . md5(time()) . '.' . $ext;
        $local_path = $file->getRealPath();//服务器临时存放地址
        $result = $this->ossUpload($key,$local_path);
        if ($result){
            //上传成功写库
            //修改
            $data = [
                'cospath'=>$result['ObjectURL'],
                'certid'=>null
            ];
            $sign_id = $decoded->sign_id;
            DB::table('sign')->where('id',$sign_id)->update($data);
            DB::table('order')->where('signid',$sign_id)->update(['isclosed'=>'0']);
            $this->ossDelete($result['ObjectURL']);
            //发送邮件
            $user = DB::table('users')
                ->where('role','<',2)
                ->orderByRaw("RAND()")
                ->first();

            //发送邮件
            Mail::to($user->email)->later(10, new UpdateSign());
            return [
                'code'=>0,
                'msg'=>"上传成功"
            ];
        }else{
            return [
                'code'=>3,
                'success'=>0,
                'message'=>'上传失败'
            ];
        }
    }

    public function renew($key){
        $decoded = JWT::decode($key, "fbkj", array('HS256'));
        if (!$decoded || session('user_id') != $decoded->user_id){
            return false;
        }
        $type = DB::table('plantype')->get();
        $plan = DB::table('plan')
            ->orderBy('month','asc')
            ->get();
        foreach ($type as $k=>$v){
            foreach ($plan as $keys=>$value){
                if ($value->plantypeid == $v->id){
                    $type[$k]->plan[$keys] = $value;
                }
            }
        }
        $blance = DB::table('blance')
            ->where(['user_id'=>session('user_id')
            ])->value('blance');
        $discount = DB::table('users')->where('id',session('user_id'))->value('discount');
        return view('sign/renew',['type'=>$type,'plan'=>$type,'token'=>$key,'discount'=>$discount,'blance'=>$blance]);
    }

    public function checkrenew($tradeno){
        $ex = DB::table('renew')->where('tradeno',$tradeno)->exists();
        if ($ex){
            return ['code'=>0,'message'=>'订单已成功。。'];
        }
    }
}
