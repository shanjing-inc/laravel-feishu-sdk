<?php

namespace Shanjing\LaravelFeishuSdk\Sheet;

class Sheet extends BaseClient
{
    /**
     * 获取工作表
     *
     * @param [type] $spreadsheetToken
     * @return array
     * @author 王衍生 wys@shanjing-inc.com
     *
     * https://open.feishu.cn/document/ukTMukTMukTM/uUDN04SN0QjL1QDN/sheets-v3/spreadsheet-sheet/query
     */
    public function sheetList($spreadsheetToken)
    {
        $url = 'https://open.feishu.cn/open-apis/sheets/v3/spreadsheets/' . $spreadsheetToken . '/sheets/query';

        $accessToken = Auth::getInternalTenantAccessToken($this->appId, $this->appSecret);

        return $this->httpRequest('get', $url, [], $accessToken);
    }

    /**
     * 查询工作表
     *
     * @param [type] $spreadsheetToken
     * @param [type] $sheetId
     * @return array
     * @author 王衍生 wys@shanjing-inc.com
     */
    public function sheetDetail($spreadsheetToken, $sheetId)
    {
        $url = 'https://open.feishu.cn/open-apis/sheets/v3/spreadsheets/' . $spreadsheetToken . '/sheets/' . $sheetId;

        $accessToken = Auth::getInternalTenantAccessToken($this->appId, $this->appSecret);

        return $this->httpRequest('get', $url, [], $accessToken);
    }

    /**
     * 操作工作表
     * 该接口用于根据 spreadsheetToken 操作表格，如增加工作表，复制工作表、删除工作表。
     *
     * @param [type] $spreadsheetToken
     * @param [type] $sheetId
     * @return array
     * @author 王衍生 wys@shanjing-inc.com
     */
    public function sheetUpdate($spreadsheetToken, $params)
    {
        $url = 'https://open.feishu.cn/open-apis/sheets/v2/spreadsheets/' . $spreadsheetToken . '/sheets_batch_update';

        $accessToken = Auth::getInternalTenantAccessToken($this->appId, $this->appSecret);

        return $this->httpRequest('post', $url, ['requests' => [$params]], $accessToken);
    }
}
