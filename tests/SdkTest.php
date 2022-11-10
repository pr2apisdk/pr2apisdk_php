<?php
namespace Pr2ApiSdk\Tests;

use Pr2ApiSdk\Sdk;
use PHPUnit\Framework\TestCase;

class SdkTest extends TestCase {

    public function getSdk() {
        $config = [
            'app_id'       => getenv('SDK_APP_ID'),
            'app_secret'   => getenv('SDK_APP_SECERT'),
            'base_api_url' => getenv('SDK_API_PRE'),
            //'log'          => true,           //是否记录sdk相关日志
            //'logfileLinux' => '/tmp/sdk.log', //linux日志路径
        ];
        return new Sdk($config);
    }

    public function testGet() {
        try {
            $api = 'test.sdk.get';
            $request = [
                'url' => $api,
                'query' => [
                    "page" => 1,
                    "pagesize" => 10,
                    "data" => [
                        "name" => "name名称",
                        "domain" => "baidu.com",
                    ],
                ],
                'body' => [],
            ];
            $sdk = $this->getSdk();
            $result = $sdk->get($request);
            //var_dump($result);
            $result = json_decode($result, 1);
            $this->assertNotNull($result);
            $this->assertEquals($result['status']['code'], 1);
        } catch(\Exception $e) {
            var_dump("code: " + $e->getCode() + " message: " + $e->getMessage());
        }
    }

    public function testGet2() {
        try {
            $api = 'test.sdk.get';
            $request = [
                'url' => $api,
                'query' => [
                    "page" => 1,
                    "pagesize" => 10,
                    "data" => [
                        "name" => "name名称",
                        "domain" => "baidu.com",
                    ],
                ],
                'body' => [],
            ];
            $sdk = $this->getSdk();
            $result = $sdk->get($request);
            //var_dump($result);
            $result = json_decode($result, 1);
            $this->assertNotNull($result);
            $this->assertEquals($result['status']['code'], 1);
        } catch(\Exception $e) {
            var_dump("code: " + $e->getCode() + " message: " + $e->getMessage());
        }
    }

}
