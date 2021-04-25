<?php

include '../vendor/autoload.php';

$config = [
    'endpoint'       =>  's3.cn-south-1.jdcloud-oss.com',
    'bucket'         =>  '',
    'access_key_id'  =>  '',
    'access_key_secret'  =>  '',
    'domain'         =>  '自定义静态域名',
    'region'         =>  'cn-south-1',
];
$jd = new \jsuphp\jdcloudOss\Sdk($config);

//上传文件
$result = $jd->upload('1.jpg','1.jpg');
echo '<pre>';
print_r($result);exit;

//删除文件
$result = $jd->delete('222.jpg');
echo '<pre>';
print_r($result);exit;