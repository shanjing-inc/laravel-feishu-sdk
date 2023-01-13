<?php
    return [
        'app' => [
            // 默认配置应用
            'default' => [
                'app_id'  => env('FEISHU_APPID', 'your-app-id'),         // AppID
                'secret'  => env('FEISHU_SECRET', 'your-app-secret'),    // AppSecret
            ],
        ],
    ];