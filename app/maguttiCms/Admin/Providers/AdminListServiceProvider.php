<?php

namespace App\MaguttiCms\Admin\Providers;
Use App;
use Illuminate\Support\ServiceProvider;

class AdminListServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('AdminList', function()
        {
            return new \App\MaguttiCms\Admin\AdminList;
        });
    }
}
