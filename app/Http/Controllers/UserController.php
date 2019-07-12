<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ChangeEmail;

class UserController extends Controller
{
    /**
     * 我的订单
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function order(){
        $user_id = session('user_id');
        $order = DB::table('order')->where('userid',$user_id)->orderBy('id','desc')->get();
        //余额
        $blance = DB::table('blance')
            ->where(['user_id'=>$user_id
            ])->value('blance');
        return view('user/order',['order'=>$order,'blance'=>$blance]);
    }

    /**
     * 设置
     * @return mixed
     */
    public function profile(Request $request){
        $user_id = session('user_id');
        if ($request->password) {
            if (($request->password != $request->repassword) || strlen($request->password)<6){
                return ['code'=>7,'message'=>'确认新密码和新密码不一致'];
            }
            if (DB::table('users')
                ->where(['id'=>$user_id,'password'=>$request->old_password])->exists()){
                return ['code'=>7,'message'=>'旧密码错误'];
            }
            $user = DB::table('users')
                ->where('id',$user_id)->update(['password'=>$request->password]);
            if ($user){
                return ['code'=>0,'message'=>'修改成功'];
            }
        }else{
            $user = DB::table('users')
                ->where('id', $user_id)
                ->select('id', 'name', 'email', 'mobile')->first();

            return view('user/profile', ['user' => $user]);
        }
    }

    /**
     * 修改用户名
     * @param Request $request
     * @return array
     */
    public function nickname(Request $request){
        $user_id = session('user_id');
        if ($request->name){
            $user = DB::table('users')
                ->where('id',$user_id)->update(['name'=>$request->name]);
            if ($user){
                return ['code'=>0,'message'=>'修改成功'];
            }
        }else{
            $user = DB::table('users')
                ->where('id',$user_id)->value('name');
            return view('user/nickname',['user'=>$user]);
        }
    }

    /**
     * 修改手机号
     * @param Request $request
     * @return array
     */
    public function phone(Request $request){
        $user_id = session('user_id');
        if ($request->mobile){
            $user = DB::table('users')
                ->where('id',$user_id)->update(['mobile'=>$request->mobile]);
            if ($user){
                return ['code'=>0,'message'=>'修改成功'];
            }
        }else{
            $user = DB::table('users')
                ->where('id',$user_id)->value('mobile');
            return view('user/phone',['user'=>$user]);
        }
    }

    /**
     * 修改邮箱
     * @param Request $request
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function email(Request $request){
        $user_id = session('user_id');
        if ($request->email&&$request->code){
            if ($request->code != session('token')){
                return ['code'=>7,'message'=>'验证码不正确'];
            }
            if (DB::table('users')
                ->where('email',$request->email)->exists()){
                return ['code'=>7,'message'=>'邮箱已绑定'];
            }
            $user = DB::table('users')
                ->where('id',$user_id)->update(['email'=>$request->email]);
            if ($user){
                return ['code'=>0,'message'=>'修改成功'];
            }
        }else{
            $user = DB::table('users')
                ->where('id',$user_id)->value('email');
            return view('user/email',['user'=>$user]);
        }
    }
    public function sendemail(Request $request){
        if ($request->email){
            session()->put('token',rand(1000,9999));
            //发送消息通知
            Mail::to($request->email)->queue(new ChangeEmail(session('token')));
        }
    }

    /**
     * 充值
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function price(){
        //余额
        $blance = DB::table('blance')
            ->where(['user_id'=>session('user_id')
            ])->value('blance');
        return view('user/price',['blance'=>$blance]);
    }
}
