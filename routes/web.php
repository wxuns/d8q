<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('sign', function () {
    return view('sign');
});//企业签名展示页
Route::get('about/agreement', function () {
    return view('about/agreement');
});//服务协议
Route::get('about/privacy', function () {
    return view('about/privacy');
});//隐私协议
Route::get('price', 'HomeController@price');//隐私协议
Route::get('about/specification', function () {
    return view('about/specification');
});//应用审核规范
Route::match(['get', 'post'],'user/login', 'AuthController@Login');
Route::match(['get', 'post'],'user/register', 'AuthController@Register');
Route::group(['middleware' => 'Auth'],function (){//登录中间件
    Route::match(['get', 'post'],'sign/upload', 'SignController@upload');
    Route::post('sign/uploadapi/{key?}', 'SignController@uploadApi');//上传文件api
    Route::get('sign/upload/{key}', 'SignController@makeUpload');
    Route::get('sign/update/{key}', 'SignController@update');
    Route::post('sign/updateapi/{key}', 'SignController@updateApi');//更新软件
    Route::post('sign/info', 'SignController@info');
    Route::get('sign/plan/{key}', 'SignController@plan');//套餐购买
    Route::get('sign/renew/{key}', 'SignController@renew');//套餐续费
    Route::get('sign/wait/{key}', 'SignController@wait');
    Route::get('sign/down/{key}', 'SignController@down');
    Route::post('sign/delcert/{key}', 'SignController@delcert');

    Route::get('sign/lists', 'SignController@lists');
    Route::get('sign/getlists', 'SignController@getlists');
    Route::get('{paytype}/{key}/{plantype}/{planid?}', 'PayController@Pay')->where('paytype','alipay|wechat|balance');
    Route::get('renew/{paytype}/{key}/{plantype}/{planid?}', 'PayController@renewPay')->where('paytype','alipay|wechat|balance');
    Route::get('checkpay/{key}','SignController@checkpay');//检测是否支付成功api
    Route::get('checkrenew/{tradeno}','SignController@checkrenew');//检测是否续费成功api
    Route::get('apps', 'HomeController@apps');//发布展示页
    Route::get('getapps', 'HomeController@getapps');
    Route::post('delapp/{key}', 'HomeController@delapp');

    Route::group(['prefix'=>'user'],function (){
        Route::get('order', 'UserController@order');//我的订单
        Route::match(['post','get'],'profile', 'UserController@profile');//账户设置
        Route::match(['post','get'],'nickname', 'UserController@nickname');//账户设置
        Route::match(['post','get'],'phone', 'UserController@phone');//账户设置
        Route::match(['post','get'],'email', 'UserController@email');//账户设置
        Route::post('/sendemail', 'UserController@sendemail');//发送邮箱
    });
    Route::get('notice/lists', 'HomeController@notice');//通知
    Route::get('balance/price', 'UserController@price');//充值
    Route::post('buy', 'PayController@buy');//充值
    Route::get('buy/{paytype}/{price}', 'PayController@buybalance');//充值
    Route::get('checkpayblance/{id}','PayController@checkpayblance');
});
Route::any('notify/{key}', 'PayController@notifyUrl');
Route::any('notifyblance/{id}', 'PayController@notifyblance');
Route::any('notifyrenew/{key}', 'PayController@notifyrenew');
//后台管理
Route::group(['prefix'=>'admin','middleware'=>'Admin'],function (){
    Route::get('/', 'AdminController@index');
    Route::post('/checkemail', 'AdminController@checkemail');//检测用户是否存在
    Route::get('/geturl', 'AdminController@adminDownload');//管理员获得文件真实url
    //应用管理
    Route::get('application', 'AdminController@app');
    Route::match(['post','get'],'addapp', 'AdminController@addapp');
    Route::match(['post','get'],'changeapp/{id}', 'AdminController@changeapp');
    Route::get('app/get', 'AdminController@getapp');
    Route::post('delapp/{id}', 'AdminController@delapp');
    //证书管理
    Route::get('cert', 'AdminController@cert');
    Route::get('getcert', 'AdminController@getcert');
    Route::match(['post','get'],'addcert', 'AdminController@addcert');
    Route::match(['post','get'],'changecert/{id}', 'AdminController@changecert');
    Route::post('delcert/{id}', 'AdminController@delcert');
    //套餐管理
    Route::get('plan', 'AdminController@plan');
    Route::match(['post','get'],'plan/add', 'AdminController@planAdd');
    Route::match(['post','get'],'changeplan/{id}', 'AdminController@changeplan');
    Route::post('delplan/{id}', 'AdminController@delplan');
    Route::get('plan/get', 'AdminController@planGet');
    //用户管理
    Route::get('user', 'AdminController@user');
    Route::get('getuser', 'AdminController@getuser');
    Route::match(['post','get'],'adduser', 'AdminController@adduser');
    Route::match(['post','get'],'changeuser/{id}', 'AdminController@changeuser');
    //管理员
    Route::match(['post','get'],'changerole/{id}', 'AdminController@changerole');
    Route::match(['post','get'],'recharge', 'AdminController@recharge');
    Route::get('getrecharge', 'AdminController@getrecharge');
    Route::post('addbalance/{id}', 'AdminController@addbalance');
    Route::post('delbalance/{id}', 'AdminController@delbalance');
    Route::match(['post','get'],'site', 'AdminController@site');
});
