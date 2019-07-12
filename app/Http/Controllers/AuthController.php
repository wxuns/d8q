<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
class AuthController extends Controller
{
    /**
     * 注册
     * @param Request $request
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function Register(Request $request){
        if ($request->input()){
            $validator = Validator::make($request->all(), [
                'captcha' => 'required|captcha'
            ]);

            if ($validator->fails()) {
                return ['code'=>1,'message'=>'验证码错误'];
            }
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
            $num = DB::table('users')->count();
            $role = $num?'0':'2';
            if ($id = DB::table('users')->insertGetId([
                'name'=>$name,
                'email'=>$email,
                'password'=>$password,
                'role'=>$role,
                'time'=>time()])){
                session()->put('user_id',$id);
                session()->put('user_name',$name);
                session()->put('user_role',$role);//普通用户默认2
                return ['code'=>0,'message'=>'注册成功'];
            }
        }else{
            return view('user/register');
        }
    }

    /**
     * 登录
     * @param Request $request
     * @return array
     */
    public function Login(Request $request){
        session()->forget('user_id');
        if ($request->input()){
            $email = $request->email;
            $password = $request->password;
            $user = DB::table('users')->where(['email'=>$email,'password'=>$password])->first();
            if ($user){
                session()->put('user_id',$user->id);
                session()->put('user_name',$user->name);
                session()->put('user_role',$user->role);
                return ['code'=>0,'message'=>'注册成功'];
            }else{
                return ['code'=>2,'message'=>'用户登录信息有误，请重试'];
            }
        }else{
            return view('user/login');
        }
    }
}
