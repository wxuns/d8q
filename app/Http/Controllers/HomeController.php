<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Firebase\JWT\JWT;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function price()
    {
        return view('price');
    }
    public function apps()
    {
        return view('app');
    }

    /**
     * 获得个人应用
     * @param Request $request
     * @return array
     */
    public function getapps(Request $request){
        $page = $request->page;
        $limit = $request->limit;
        $key = $request->key;
        $data = DB::table('sign')
            ->skip(($page-1)*$limit)->take($limit)
            ->where('userid',session('user_id'))
            ->where('filename','like','%'.$key.'%')
            ->orderBy('id','desc')
            ->select('id','filename','cospath','subid','certid')
            ->get();
        foreach ($data as $k=>$v){
            $key = "fbkj";
            $data[$k]->key = JWT::encode(['sign_id'=>$v->id,'user_id'=>session('user_id')], $key);
            if ($v->certid)
                $data[$k]->cospath = $this->ossDownload($v->cospath);
            else
                unset($data[$k]->cospath);

            //服务时长
            $o = DB::table('order')
                ->where('order.signid',$v->id)
                ->join('plan','plan.id','=','order.planid')
                ->select('order.time','plan.month')->first();
            $s = DB::table('renew')
                ->where('renew.signid',$v->id)
                ->join('plan','plan.id','=','renew.planid')
                ->select('renew.time','plan.month')->get();
            $th = $o->time+($o->month*30*24*60*60);
            foreach ($s as $v){
                $th += ($o->month*30*24*60*60)+$v->month*30*24*60*60;
            }
            $days = intval(($th-time())/86400);
            $data[$k]->day = $days>365?(intval($days/365)).'年'.($days-365).'天':$days;
        }
        return [
            'code'=>0,
            'msg'=>0,
            'count'=>DB::table('sign')->where('userid',session('user_id'))->count(),
            'data'=>$data
        ];
    }

    /**
     * 删除app
     * @param Request $request
     * @param $key
     * @return array|bool
     */
    public function delapp(Request $request,$key){
        $decoded = JWT::decode($key, "fbkj", array('HS256'));
        if (!$decoded || session('user_id') != $decoded->user_id){
            return false;
        }
        if (!DB::table('users')->where(['id'=>$decoded->user_id,'password'=>$request->password])->exists()){
            return ['code'=>6,'message'=>'信息不准确，删除失败'];
        }
        if (DB::table('sign')->delete($decoded->sign_id)){
            return ['code'=>0,'message'=>'删除成功'];
        }
    }

    /**
     *通知
     * @return mixed
     */
    public function notice(){
        $user_id = session('user_id');
        $notice = DB::table('notice')
            ->where('user_id',$user_id)
            ->orderBy('notice.id','desc')
            ->get();
        foreach ($notice as $k=>$v){
            if ($v->sign_id){
                $notice[$k]->filename = DB::table('sign')->where('id',$v->sign_id)->value('filename');
            }
        }
        //消息变更为已读
        DB::table('notice')
            ->where('user_id',$user_id)->update(['isread'=>1]);
        return view('notice',['notice'=>$notice]);
    }
}
