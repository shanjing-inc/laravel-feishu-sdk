<?php

namespace Shanjing\LaravelFeishuSdk;

use Illuminate\Support\ServiceProvider;

class LaravelFeishuSdkServiceProvider extends ServiceProvider
{
    /**
     * 服务提供者加是否延迟加载.
    *
    * @var bool
    */
    protected $defer = false;

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            // __DIR__.'/views' => base_path('resources/views/vendor/packagetest'),  // 发布视图目录到resources 下
            __DIR__.'/../config/feishu.php' => config_path('feishu.php'), // 发布配置文件到 laravel 的config 下
        ]);
    }
}
