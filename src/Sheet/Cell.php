<?php

namespace Shanjing\LaravelFeishuSdk\Sheet;

class Cell extends BaseClient
{
    /**
     * 追加数据
     * 该接口用于根据 spreadsheetToken 和 range 遇到空行则进行覆盖追加或新增行追加数据。 空行：默认该行第一个格子是空，则认为是空行；单次写入不超过5000行，100列，每个格子不超过5万字符。
     *
     * @param [type] $spreadsheetToken
     * @param [type] $sheetId
     * @return array
     * @author 王衍生 wys@shanjing-inc.com
     *
     * https://open.feishu.cn/document/ukTMukTMukTM/uMjMzUjLzIzM14yMyMTN
     */
    public function valuesAppend($spreadsheetToken, $params)
    {
        // insertDataOption：遇到空行追加，默认 OVERWRITE，若空行的数量小于追加数据的行数，则会覆盖已有数据；可选 INSERT_ROWS ，会在插入足够数量的行后再进行数据追加
        $url = 'https://open.feishu.cn/open-apis/sheets/v2/spreadsheets/' . $spreadsheetToken . '/values_append?insertDataOption=INSERT_ROWS';

        $accessToken = Auth::getInternalTenantAccessToken($this->appId, $this->appSecret);

        return $this->httpRequest('post', $url, $params, $accessToken);
    }
}
