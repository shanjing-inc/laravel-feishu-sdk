<?php

namespace Shanjing\LaravelFeishuSdk\Sheet;

class Table extends BaseClient
{
    /**
     * 创建电子表格
     *
     * @param string $title
     * @param string $folderToken
     * @return array
     * @author 王衍生 wys@shanjing-inc.com
     *
     * https://open.feishu.cn/document/ukTMukTMukTM/uUDN04SN0QjL1QDN/sheets-v3/spreadsheet/create
     */
    public function create($title = '', $folderToken = '')
    {
        $url = 'https://open.feishu.cn/open-apis/sheets/v3/spreadsheets';

        $formParams = [
            'title'        => $title,
            'folder_token' => $folderToken,
        ];

        $accessToken = Auth::getInternalTenantAccessToken($this->appId, $this->appSecret);

        return $this->httpRequest('post', $url, $formParams, $accessToken);
    }

    /**
     * 获取表格信息
     *
     * @return array
     * @author 王衍生 wys@shanjing-inc.com
     *
     * https://open.feishu.cn/document/ukTMukTMukTM/uUDN04SN0QjL1QDN/sheets-v3/spreadsheet/get
     */
    public function metainfo($token)
    {
        $url = 'https://open.feishu.cn/open-apis/sheets/v3/spreadsheets/' . $token;

        $accessToken = Auth::getInternalTenantAccessToken($this->appId, $this->appSecret);

        return $this->httpRequest('get', $url, [], $accessToken);
    }
}
