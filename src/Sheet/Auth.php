<?php

namespace Shanjing\LaravelFeishuSdk\Sheet;

use Illuminate\Support\Facades\Cache;

class Auth extends BaseClient
{
    /**
     * 获取 tenant_access_token（企业自建应用）
     *
     * @param [type] $appId
     * @param [type] $appSecret
     * @return void
     * @author 王衍生 <wys@shanjing-inc.com>
     *
     * https://open.feishu.cn/document/ukTMukTMukTM/ukDNz4SO0MjL5QzM/auth-v3/auth/tenant_access_token_internal
     */
    public static function getInternalTenantAccessToken($appId, $appSecret)
    {
        return Cache::remember('shanjing_laravel_feishu_sdk:internal_tenant_access_token:' . $appId, now()->addMinutes(110), function () use ($appId, $appSecret) {
            // 缓存 token
            $url        = 'https://open.feishu.cn/open-apis/auth/v3/tenant_access_token/internal';
            $formParams = [
                'app_id'     => $appId,
                'app_secret' => $appSecret,
            ];

            $result = BaseClient::httpRequest('post', $url, $formParams);

            return array_get($result, 'tenant_access_token');
        });
    }
}
