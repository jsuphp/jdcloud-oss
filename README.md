京东云存储SDK
===============

> 运行环境要求PHP7.1+，兼容PHP8.0。

[官方应用服务市场](https://market.topthink.com) | [`ThinkAPI`——官方统一API服务](https://docs.topthink.com/think-api)

ThinkPHPV6.0版本由[亿速云](https://www.yisu.com/)独家赞助发布。

## 主要新特性

* 采用`PHP7`强类型（严格模式）
* 支持更多的`PSR`规范
* 原生多应用支持
* 更强大和易用的查询
* 全新的事件系统
* 模型事件和数据库事件统一纳入事件系统
* 模板引擎分离出核心
* 内部功能中间件化
* SESSION/Cookie机制改进
* 对Swoole以及协程支持改进
* 对IDE更加友好
* 统一和精简大量用法

## 安装

~~~
composer create-project jsuphp/jdcloud-oss
~~~

如果需要更新框架使用
~~~
composer update topthink/framework
~~~

## 上传文件

```

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
```