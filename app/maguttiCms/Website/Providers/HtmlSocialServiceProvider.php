<?php

namespace App\MaguttiCms\Website\Providers;
Use App;
use Illuminate\Support\ServiceProvider;

class HtmlSocialServiceProvider extends ServiceProvider
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
        App::bind('HtmlSocial', function()
        {
            return new \App\MaguttiCms\Website\Decorator\HtmlSocial;
        });
    }
}
