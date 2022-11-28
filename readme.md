# API PHP SDK

### 说明

* 接口基地址，如： http://api.local.com/V4/ ，具体地址请咨询运营人员
* 接口遵循RESTful,默认请求体json,接口默认返回json
* app_id, app_secret 联系技术客服，先注册一个账号，用于申请绑定api身份

### 签名算法

* 每次请求都签名，保证传输过程数据不被篡改
* 客户端：sha256签名算法，将参数base64编码+app_secret用sha256签名，每次请求带上签名
* 服务端：拿到参数用相同的算法签名，对比签名是否正确

### sdk 使用说明

* 环境：php >=5.5
* 支持get/post/patch/put/delete方法
* 参数说明
    * app_id 分配的app_id
    * app_secert 分配的app_secert, 用于签名数据
    * api_pre api前缀
    * timeout 请求超时时间，默认10秒，请合理设置
* 每次调用会返回三个参数：(原始字符串，解析后的json字典，错误字符串)
* 注意事项
    针对所有请求，uri与get参数是分离的，如 https://api.local.com/V4/version?v=1, 调用时v=1参数，须通过query传递

### 安装

composer require pr2apisdk/sdk

### 使用

```
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require './vendor/autoload.php';

try {
    $config = [
        'app_id'       => getenv('SDK_APP_ID'),
        'app_secret'   => getenv('SDK_APP_SECERT'),
        'base_api_url' => getenv('SDK_API_PRE'),
        //'log'          => true,           //是否记录sdk相关日志
        //'logfileLinux' => '/tmp/sdk.log', //linux日志路径
    ];
    $sdk = new \Pr2ApiSdk\Sdk($config);


    // GET 请求
    $request = [
        'url' => 'test.sdk.get',
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
    $result = $sdk->get($request);
    $jsonData = json_decode($result, 1);
    print_r("api: ".$request['url']."\n");
    print_r("raw: ".$result."\n");
    print_r($jsonData);
    print_r("\n");

    // POST 请求
    $request = [
        'url' => 'test.sdk.post',
        'query' => [],
        'body' => [
            "page" => 1,
            "pagesize" => 10,
            "data" => [
                "name" => "name名称",
                "domain" => "baidu.com",
            ],
        ],
    ];
    $result = $sdk->post($request);
    $jsonData = json_decode($result, 1);
    print_r("api: ".$request['url']."\n");
    print_r("raw: ".$result."\n");
    print_r($jsonData);
    print_r("\n");

    // PATCH 请求
    $request = [
        'url' => 'test.sdk.patch',
        'query' => [],
        'body' => [
            "page" => 1,
            "pagesize" => 10,
            "data" => [
                "name" => "name名称",
                "domain" => "baidu.com",
            ],
        ],
    ];
    $result = $sdk->patch($request);
    $jsonData = json_decode($result, 1);
    print_r("api: ".$request['url']."\n");
    print_r("raw: ".$result."\n");
    print_r($jsonData);
    print_r("\n");

    // PUT 请求
    $request = [
        'url' => 'test.sdk.put',
        'query' => [],
        'body' => [
            "page" => 1,
            "pagesize" => 10,
            "data" => [
                "name" => "name名称",
                "domain" => "baidu.com",
            ],
        ],
    ];
    $result = $sdk->put($request);
    $jsonData = json_decode($result, 1);
    print_r("api: ".$request['url']."\n");
    print_r("raw: ".$result."\n");
    print_r($jsonData);
    print_r("\n");

    // DELETE 请求
    $request = [
        'url' => 'test.sdk.delete',
        'query' => [],
        'body' => [
            "page" => 1,
            "pagesize" => 10,
            "data" => [
                "name" => "name名称",
                "domain" => "baidu.com",
            ],
        ],
    ];
    $result = $sdk->delete($request);
    $jsonData = json_decode($result, 1);
    print_r("api: ".$request['url']."\n");
    print_r("raw: ".$result."\n");
    print_r($jsonData);
} catch(\Exception $e) {
    var_dump("code: " + $e->getCode() + " message: " + $e->getMessage());
}
```

### 更新日志

* 2022.11.09

完成php版SDK开发

* 2022.11.28

修改默认的UserAgent
SDK验证兼容json的UTF8编码格式
