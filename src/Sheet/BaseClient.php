<?php

namespace Shanjing\LaravelFeishuSdk\Sheet;

use Exception;
use GuzzleHttp\Client;

class BaseClient
{
    /**
     * 应用 appid
     *
     * @var string
     * @author 王衍生 wys@shanjing-inc.com
     */
    protected $appId;

    /**
     * 应用 appSecret
     *
     * @var string
     * @author 王衍生 wys@shanjing-inc.com
     */
    protected $appSecret;

    /**
     * 构造对象
     *
     * @param [type] ...$params
     * @return static
     * @author 王衍生 wys@shanjing-inc.com
     */
    public static function make(...$params)
    {
        return new static(...$params);
    }

    public function __construct($appId = null, $appSecret = null)
    {
        $this->appId     = $appId;
        $this->appSecret = $appSecret;
    }

    protected static function httpRequest($method, $uri, $params = [], $accessToken = null)
    {
        $base = [
            // 'base_uri'        => 'https://open.feishu.cn/open-apis/',
            'timeout' => 3,
            //    'allow_redirects' => false,
            //    'proxy'           => '192.168.16.1:10'
        ];

        $options = [
            'headers' => [
                // 'Authorization' => "Bearer {$accessToken}",
                'Content-Type' => 'application/json; charset=utf-8',
            ]
        ];

        if ($method == 'get') {
            $options['query'] = $params;
        } elseif ($method == 'post') {
            $options['json'] = $params;
        }

        if ($accessToken) {
            $options['headers']['Authorization'] = "Bearer {$accessToken}";
        }

        $resp     = (new Client($base))->$method($uri, $options);
        $contents = $resp->getBody()->getContents();
        $result   = json_decode($contents, true);

        if ($result['code']) {
            throw new Exception($result['msg'], $result['code']);
        }

        return $result;
    }
}
