<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Firebase\JWT\JWT;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use GuzzleHttp\Client;
use App\Mail\OrderReceive;
use App\Mail\BuyBalance;
use App\Mail\RenewEmail;

class PayController extends Controller
{
    /**
     * 支付接口
     * @param Request $request
     * @return bool|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function Pay(Request $request){
        $decoded = JWT::decode($request->key, "fbkj", array('HS256'));
        if (!$decoded || session('user_id') != $user_id = $decoded->user_id){//安全验证
            return false;
        }
        $sign_id = $decoded->sign_id;

        $ex = DB::table('order')->where('signid',$sign_id)->exists();
        if ($ex){
            return '订单已成功。。';
        }
        $paytype = $request->paytype;

        //判断套餐
        $planid = $request->planid;
        $plantype = $request->plantype;
        if (!$planid){
            $planid = DB::table('plan')
                ->where(['plantypeid'=>$plantype,'month'=>3])
                ->value('id');
            if (!$planid){
                $planid = DB::table('plan')
                    ->where(['plantypeid'=>$plantype,'month'=>1])
                    ->value('id');
            }
        }
        $discount = DB::table('users')->where('id',$user_id)->value('discount');
        $price = DB::table('plan')->where('id',$planid)->value('price')*$discount;
        if ($paytype == 'balance'){
            $data['planid'] = $planid;
            $data['signid'] = $sign_id;
            $data['userid'] = $user_id;
            $data['price'] = $price;
            $data['paytype'] = 3;
            $data['time'] = time();
            $data['tradeno'] = md5(time());//交易流水号

            if($subid = DB::table('order')->insertGetId($data)){
                DB::table('sign')->where('id',$sign_id)
                    ->update(['planid'=>$planid,'subid'=>$subid]);
                DB::table('blance')->where('user_id',$user_id)->decrement('blance',$price);
                DB::table('notice')
                    ->insert(['user_id'=>$user_id,
                        'sign_id'=>$subid,
                        'type'=>1,
                        'message'=>'新的签名',
                        'time'=>time(),
                    ]);
                //发送邮件
                $user = DB::table('users')
                    ->where('role','<',2)
                    ->orderByRaw("RAND()")
                    ->first();

                //发送邮件
                Mail::to($user->email)->later(10, new OrderReceive());
                return redirect('/sign/wait/'.$request->key);
            }
        }else{
            $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => 'https://open.yunmianqian.com',
            ]);
            $response = $client->request('POST', '/api/pay?order_cache=true', [
                'form_params' => [
                    'app_id' => env('YMQ_APP_ID'),
                    'out_order_sn'=>$sign_id.'_'.session('user_id'),
                    'name' => '企业签名',
                    'pay_way' => $paytype,
                    'price'=>$price*100,
                    'attach'=>$planid,
                    'notify_url'=>env('APP_URL')."/notify/$request->key",
                    'sign'=>md5(env('YMQ_APP_ID').$sign_id.'_'.session('user_id').'企业签名'.$paytype.($price*100).$planid.env('APP_URL')."/notify/$request->key".env('YMQ_APP_KEY')),
                    'multiple' => [
                        'headers' => ['content-type'=>'application/x-www-form-urlencoded']
                    ]
                ]
            ]);
            $body = json_decode($response->getBody());
            // Implicitly cast the body to a string and echo it
            if ($body->code == 200){
                return view('pay',['body'=>$body,'token'=>$request->key]);
            }else{
                return false;
            }
        }
    }

    /**
     * 回调
     * @param Request $request
     * @param $key
     * @return bool|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|string
     */
    public function notifyUrl(Request $request,$key){
        $decoded = JWT::decode($key, "fbkj", array('HS256'));
        $out_order_sn = explode('_',$request->out_order_sn);
        $sign_id = $out_order_sn[0];
        $user_id = $out_order_sn[1];
        if (!$decoded || $user_id != $decoded->user_id || $sign_id != $decoded->sign_id){//安全验证
            return false;
        }
        $paytype = $request->pay_way;
        $planid = $request->attach;
        $data['planid'] = $planid;
        $data['signid'] = $sign_id;
        $data['userid'] = $user_id;
        $data['price'] = $request->price / 100;
        if ($paytype == 'alipay'){
            $data['paytype'] = 1;
        }else{
            $data['paytype'] = 2;
        }
        $data['time'] = time();
        $data['tradeno'] = $request->order_sn;//交易流水号

        if($subid = DB::table('order')->insertGetId($data)){
            DB::table('sign')->where('id',$sign_id)
                ->update(['planid'=>$planid,'subid'=>$subid]);
            DB::table('notice')
                ->insert(['user_id'=>$user_id,
                    'sign_id'=>$subid,
                    'type'=>1,
                    'message'=>'新的签名',
                    'time'=>time(),
                ]);
            //发送邮件
            $user = DB::table('users')
                ->where('role','<',2)
                ->orderByRaw("RAND()")
                ->first();

            //发送邮件
            Mail::to($user->email)->later(10, new OrderReceive());
            return redirect('/sign/wait/'.$request->key);
        }
    }

    public function buy(Request $request){
        $pay_channel = $request->pay_channel;
        if ($pay_channel == 'transfer'){
            $transfer = json_decode($request->transfer);
            DB::table('blancecard')->insert([
                'user_id'=>session('user_id'),
                'transfer_name'=>$transfer->transfer_name,
                'transfer_no'=>$transfer->transfer_no,
                'quantity'=>$request->quantity,
                'status'=>0,
                'time'=>time()]);
            return ['code'=>200,'data'=>['is_payed'=>1,'url'=>'/user/order']];
        }
    }

    /**
     * 充值接口
     * @param $paytype
     * @param $price
     * @return bool|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function buybalance($paytype,$price){
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://open.yunmianqian.com',
        ]);
        $user_id = session('user_id');
        $response = $client->request('POST', '/api/pay?order_cache=true', [
            'form_params' => [
                'app_id' => env('YMQ_APP_ID'),
                'out_order_sn'=>$user_id,
                'name' => '客户充值',
                'pay_way' => $paytype,
                'price'=>intval($price)*100,
                'notify_url'=>env('APP_URL')."/notifyblance/".$user_id,
                'sign'=>md5(env('YMQ_APP_ID').$user_id.'客户充值'.$paytype.(intval($price)*100).env('APP_URL')."/notifyblance/".$user_id.env('YMQ_APP_KEY')),
                'multiple' => [
                    'headers' => ['content-type'=>'application/x-www-form-urlencoded']
                ]
            ]
        ]);
        $body = json_decode($response->getBody());
        // Implicitly cast the body to a string and echo it
        if ($body->code == 200){
            return view('payblance',['body'=>$body]);
        }else{
            return false;
        }
    }

    /**
     * 回调
     * @param Request $request
     * @param $id
     * @return bool|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|string
     */
    public function notifyblance(Request $request,$id){
        $user_id = $request->out_order_sn;
        if ($user_id != $id){//安全验证
            return false;
        }
        $ex = DB::table('blancelog')->where('tradeno',$request->order_sn)->exists();
        if ($ex){
            return '订单已成功。。';
        }
        $price = $request->price / 100;
        $paytype = $request->pay_way;
        $data['user_id'] = $user_id;
        $data['quantity'] = $price;
        if ($paytype == 'alipay'){
            $data['paytype'] = 1;
        }else{
            $data['paytype'] = 2;
        }
        $data['time'] = time();
        $data['tradeno'] = $request->order_sn;//交易流水号

        if($blancelogid = DB::table('blancelog')->insertGetId($data)){
            if (DB::table('blance')->where('user_id',$user_id)->exists()){
                DB::table('blance')->where('user_id',$user_id)
                    ->increment('blance',$price);
            }else{
                DB::table('blance')
                    ->insert(['user_id'=>$user_id,
                        'blance'=>$price
                    ]);
            }
            DB::table('notice')
                ->insert(['user_id'=>$user_id,
                    'sign_id'=>0,
                    'type'=>3,
                    'message'=>'充值成功',
                    'time'=>time(),
                ]);
            //发送邮件
            $email = DB::table('users')
                ->where('id',$user_id)
                ->value('email');

            //发送邮件
            Mail::to($email)->later(10, new BuyBalance());
            return redirect('/user/order');
        }
    }

    /**
     * 检测是否支付成功
     * @param $id
     * @return array
     */
    public function checkpayblance($id){
        $user_id = session('user_id');
        $ex = DB::table('blancelog')->where(['user_id'=>$user_id,'tradeno'=>$id])->exists();
        if ($ex){
            return ['code'=>0,'message'=>'订单已成功。。'];
        }
    }

    public function renewPay(Request $request){
        $decoded = JWT::decode($request->key, "fbkj", array('HS256'));
        if (!$decoded || session('user_id') != $user_id = $decoded->user_id){//安全验证
            return false;
        }
        $sign_id = $decoded->sign_id;

        $paytype = $request->paytype;

        //判断套餐
        $planid = $request->planid;
        $plantype = $request->plantype;
        if (!$planid){
            $planid = DB::table('plan')
                ->where(['plantypeid'=>$plantype,'month'=>3])
                ->value('id');
            if (!$planid){
                $planid = DB::table('plan')
                    ->where(['plantypeid'=>$plantype,'month'=>1])
                    ->value('id');
            }
        }

        $discount = DB::table('users')->where('id',$user_id)->value('discount');
        $price = DB::table('plan')->where('id',$planid)->value('price')*$discount;
        if ($paytype == 'balance'){
            $data['planid'] = $planid;
            $data['signid'] = $sign_id;
            $data['userid'] = $user_id;
            $data['price'] = $price;
            $data['paytype'] = 3;
            $data['time'] = time();
            $data['tradeno'] = md5(time());//交易流水号

            if($subid = DB::table('renew')->insertGetId($data)){
                DB::table('notice')
                    ->insert(['user_id'=>$user_id,
                        'sign_id'=>$subid,
                        'type'=>4,
                        'message'=>'续费',
                        'time'=>time(),
                    ]);
                //发送邮件
                $email = DB::table('users')
                    ->where('id',$user_id)
                    ->value('email');

                DB::table('blance')->where('user_id',$user_id)->decrement('blance',$price);
                //发送邮件
                Mail::to($email)->later(10, new RenewEmail());
                return redirect('/apps');
            }
        }else{
            $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => 'https://open.yunmianqian.com',
            ]);
            $response = $client->request('POST', '/api/pay?order_cache=true', [
                'form_params' => [
                    'app_id' => env('YMQ_APP_ID'),
                    'out_order_sn'=>$sign_id.'_'.session('user_id'),
                    'name' => '签名续费',
                    'pay_way' => $paytype,
                    'price'=>$price*100,
                    'attach'=>$planid,
                    'notify_url'=>env('APP_URL')."/notifyrenew/$request->key",
                    'sign'=>md5(env('YMQ_APP_ID').$sign_id.'_'.session('user_id').'签名续费'.$paytype.($price*100).$planid.env('APP_URL')."/notifyrenew/$request->key".env('YMQ_APP_KEY')),
                    'multiple' => [
                        'headers' => ['content-type'=>'application/x-www-form-urlencoded']
                    ]
                ]
            ]);
            $body = json_decode($response->getBody());
            // Implicitly cast the body to a string and echo it
            if ($body->code == 200){
                return view('renewpay',['body'=>$body,'token'=>$request->key]);
            }else{
                return false;
            }
        }
    }
    public function notifyrenew(Request $request){
        $decoded = JWT::decode($request->key, "fbkj", array('HS256'));
        $out_order_sn = explode('_',$request->out_order_sn);
        $sign_id = $out_order_sn[0];
        $user_id = $out_order_sn[1];

        if (!$decoded || $user_id != $decoded->user_id || $sign_id != $decoded->sign_id){//安全验证
            return false;
        }
        $paytype = $request->pay_way;
        $planid = $request->attach;
        $data['planid'] = $planid;
        $data['signid'] = $sign_id;
        $data['userid'] = $user_id;
        $data['price'] = $request->price / 100;
        if ($paytype == 'alipay'){
            $data['paytype'] = 1;
        }else{
            $data['paytype'] = 2;
        }
        $data['time'] = time();
        $data['tradeno'] = $request->order_sn;//交易流水号

        if($subid = DB::table('renew')->insertGetId($data)){
            DB::table('notice')
                ->insert(['user_id'=>$user_id,
                    'sign_id'=>$subid,
                    'type'=>4,
                    'message'=>'续费',
                    'time'=>time(),
                ]);
            //发送邮件
            $email = DB::table('users')
                ->where('id',$user_id)
                ->value('email');

            //发送邮件
            Mail::to($email)->later(10, new RenewEmail());
            return redirect('/apps');
        }
    }
}
