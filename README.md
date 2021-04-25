京东云存储SDK
===============

## 安装

~~~
composer require jsuphp/jdcloud-oss
~~~

## 实例化类

```php
//傻瓜方式
include '../vendor/autoload.php';
//命名空间
use jsuphp\jdcloudOss\Sdk;


$config = [
    'endpoint'       =>  's3.cn-south-1.jdcloud-oss.com',
    'bucket'         =>  '',
    'access_key_id'  =>  '',
    'access_key_secret'  =>  '',
    'domain'         =>  '自定义静态域名',
    'region'         =>  'cn-south-1',
];
$jd = new \jsuphp\jdcloudOss\Sdk($config);
```

## 上传文件
```php
$result = $jd->upload('1.jpg','1.jpg');
echo '<pre>';
print_r($result);exit;
```
## 删除文件
```php
$result = $jd->delete('222.jpg');
print_r($result);exit;
```