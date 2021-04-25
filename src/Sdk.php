<?php

namespace jsuphp\jdcloudOss;

include_once 'jd/autoload.php';

class Sdk
{
    public static $client;
    public static $config;

    public function __construct(array $config)
    {
        $endpoint = (strpos($config['endpoint'], 'http') !== false) ? $config['endpoint'] : $_SERVER['REQUEST_SCHEME'] . '://' . $config['endpoint'];
        self::$client = new \Aws\S3\S3Client([
            'version' => 'latest',
            'region' => $config['region'],
            'endpoint' => $endpoint,
            'signature_version' => 'v4',
            'credentials' => [
                'key'    => $config['access_key_id'],
                'secret' => $config['access_key_secret'],
            ],
        ]);
        self::$config = $config;
    }

    public function upload($name, $file)
    {
        try {
            self::$client->putObject([
                'Bucket' => self::$config['bucket'],
                'Key'    => $name,
                'Body'   => fopen($file, 'r'),
                'ACL'    => 'public-read',
            ]);
        } catch (\OSS\Core\OssException $e) {
            throw new \Exception($e->getMessage());
        }
        return ((strpos(self::$config['domain'], 'http') !== false) ? self::$config['domain'] : $_SERVER['REQUEST_SCHEME'] . '://' . self::$config['domain']) . '/' . $name;
    }

    public function delete($name)
    {
        try {
            self::$client->deleteObject([
                'Bucket'    =>  self::$config['bucket'],
                'Key'       =>  $name
            ]);
        } catch (\OSS\Core\OssException $e) {
            throw new \Exception($e->getMessage());
        }
        return true;
    }
}
