<?php

namespace App\MaguttiCms\Website\Providers;
Use App;
use Illuminate\Support\ServiceProvider;

class WebsiteDbServiceProvider extends ServiceProvider
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
        App::bind('App\MaguttiCms\Website\Repos\Article\ArticleRepositoryInterface', 'App\MaguttiCms\Website\Repos\Article\DbArticleRepository');
        App::bind('App\MaguttiCms\Website\Repos\News\NewsRepositoryInterface', 'App\MaguttiCms\Website\Repos\News\DbNewsRepository');
        App::bind('App\MaguttiCms\Website\Repos\Product\ProductRepositoryInterface', 'App\MaguttiCms\Website\Repos\Product\DbProductRepository');

        // heshen add
        App::bind('App\MaguttiCms\Website\Repos\Botanies\BotaniesRepositoryInterface', 'App\MaguttiCms\Website\Repos\Botanies\DbBotaniesRepository');

    }
}
