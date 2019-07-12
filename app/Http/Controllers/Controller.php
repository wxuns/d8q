<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Qcloud\Cos\Client;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function cosClient(){
        $secretId = env('SecretId'); //"云 API 密钥 SecretId";
        $secretKey = env('SecretKey'); //"云 API 密钥 SecretKey";
        $region = env('Region'); //设置一个默认的存储桶地域
        $cosClient = new Client(
            array(
                'region' => $region,
                'schema' => 'https', //协议头部，默认为http
                'credentials'=> array(
                    'secretId'  => $secretId ,
                    'secretKey' => $secretKey)));
        return $cosClient;
    }

    public function ossUpload($key,$local_path)
    {
        $bucket = env('Bucket');
        return $this->cosClient()->putObject(array(
            'Bucket' => $bucket,
            'Key' => $key,
            'Body' => fopen($local_path, 'rb')));
    }

    public function ossDownload($key){
        $key = substr($key,strlen('https://fubi-1251983762.cos.ap-guangzhou.myqcloud.com'));
        $bucket = env('Bucket');
        return $this->cosClient()->getObjectUrl($bucket, $key, '+10 minutes');
    }

    public function ossDelete($key){
        $key = substr($key,strlen('https://fubi-1251983762.cos.ap-guangzhou.myqcloud.com'));
        $bucket = env('Bucket');
        return $this->cosClient()->deleteObject(array(
            'Bucket' => $bucket,
            'Key' => $key,
            'VersionId' => 'string'
        ));
    }
}
