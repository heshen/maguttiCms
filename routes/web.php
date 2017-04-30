<?php

/*
|--------------------------------------------------------------------------
| ADMIN Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::group(array('prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['adminauth']), function () {

    Route::get('/',                         '\App\MaguttiCms\Admin\Controllers\AdminPagesController@home');
    Route::get('/list/{section?}/{sub?}',   '\App\MaguttiCms\Admin\Controllers\AdminPagesController@lista');
    Route::get('/create/{section}',         '\App\MaguttiCms\Admin\Controllers\AdminPagesController@create');
    Route::post('/create/{section}',        '\App\MaguttiCms\Admin\Controllers\AdminPagesController@store');


    Route::get('/edit/{section}/{id?}/{type?}', '\App\MaguttiCms\Admin\Controllers\AdminPagesController@edit');
    Route::post('/edit/{section}/{id?}',        '\App\MaguttiCms\Admin\Controllers\AdminPagesController@update');

    Route::get('/editmodal/{section}/{id?}/{type?}','\App\MaguttiCms\Admin\Controllers\AdminPagesController@editmodal');
    Route::post('/editmodal/{section}/{id?}',       '\App\MaguttiCms\Admin\Controllers\AdminPagesController@updatemodal');
    Route::get('/delete/{section}/{id?}',           '\App\MaguttiCms\Admin\Controllers\AdminPagesController@destroy');

    Route::get('api/update/{method}/{model?}/{id?}',        '\App\MaguttiCms\Admin\Controllers\AjaxController@update');
    Route::get('api/delete/{model?}/{id?}',                 '\App\MaguttiCms\Admin\Controllers\AjaxController@delete');
    Route::post('api/uploadifive/',                         '\App\MaguttiCms\Admin\Controllers\AjaxController@uploadifive');
    Route::get('api/updateHtml/{mediaType?}/{model?}/{id?}','\App\MaguttiCms\Admin\Controllers\AjaxController@updateMediaList');
    Route::get('api/updateMediaSortList/',                  '\App\MaguttiCms\Admin\Controllers\AjaxController@updateMediaSortList');
    Route::get('api/suggest', ['as' => 'api.suggest', 'uses' => '\App\MaguttiCms\Admin\Controllers\AjaxController@suggest']);

    Route::get('export/{model?}',               '\App\MaguttiCms\Admin\Controllers\AdminExportController@model');
    Route::get('/exportlist/{section?}/{sub?}', '\App\MaguttiCms\Admin\Controllers\AdminExportController@lista');

});

/*
    |--------------------------------------------------------------------------
    | ADMIN AUTH
    |--------------------------------------------------------------------------
    */
Route::group(array('prefix' => 'admin'), function () {

    // Admin Auth and Password routes...
    Route::get('login',  '\App\MaguttiCms\Admin\Controllers\Auth\LoginController@showLoginForm');
    Route::post('login', '\App\MaguttiCms\Admin\Controllers\Auth\LoginController@login');
    Route::get('logout', '\App\MaguttiCms\Admin\Controllers\Auth\LoginController@logout');


    // Password Reset Routes...
    Route::get('password/reset',         '\App\MaguttiCms\Admin\Controllers\Auth\ForgotPasswordController@showLinkRequestForm');
    Route::post('password/email',        '\App\MaguttiCms\Admin\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::get('password/reset/{token}', '\App\MaguttiCms\Admin\Controllers\Auth\ResetPasswordController@showResetForm');
    Route::post('password/reset',        '\App\MaguttiCms\Admin\Controllers\Auth\ResetPasswordController@reset');
});

/*
|--------------------------------------------------------------------------
| FRONT END
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {



    // Authentication routes...
    Route::get('users/login', '\App\MaguttiCms\Website\Controllers\Auth\LoginController@showLoginForm')->name('users/login');
    Route::post('users/login','\App\MaguttiCms\Website\Controllers\Auth\LoginController@login');
    Route::get('users/logout','\App\MaguttiCms\Website\Controllers\Auth\LoginController@logout');


    // Registration routes...
    Route::get('/register', '\App\MaguttiCms\Website\Controllers\Auth\RegisterController@showRegistrationForm');
    Route::post('/register','\App\MaguttiCms\Website\Controllers\Auth\RegisterController@register');

    // Password Reset Routes...
    Route::get('password/reset',        '\App\MaguttiCms\Website\Controllers\Auth\ForgotPasswordController@showLinkRequestForm');
    Route::post('password/email',       '\App\MaguttiCms\Website\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::get('password/reset/{token}','\App\MaguttiCms\Website\Controllers\Auth\ResetPasswordController@showResetForm');
    Route::post('password/reset',       '\App\MaguttiCms\Website\Controllers\Auth\ResetPasswordController@reset');


    // Pages routes...
    Route::get('/',                     '\App\MaguttiCms\Website\Controllers\PagesController@home');
    Route::get('/news/',                '\App\MaguttiCms\Website\Controllers\PagesController@news');
    Route::get('/news/{slug}',          '\App\MaguttiCms\Website\Controllers\PagesController@news');
    Route::get('/botanies/',                '\App\MaguttiCms\Website\Controllers\PagesController@botanies');
    Route::get('/products/{product?}',	'\App\MaguttiCms\Website\Controllers\ProductsController@products');
    Route::get('/{slug?}',              '\App\MaguttiCms\Website\Controllers\PagesController@pages');
    Route::post('/contacts/',		    '\App\MaguttiCms\Website\Controllers\WebsiteFormController@getContactUsForm');

    // Api
    /* TODO   fix */
    Route::post('/api/newsletter',      '\App\MaguttiCms\Website\Controllers\APIController@subscribeNewsletter');

});

/*
|--------------------------------------------------------------------------
|   RESERVED AREA USER ROUTES
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => ['auth']], function () {
    Route::get('users/dashboard',    '\App\MaguttiCms\Website\Controllers\ReservedAreaController@dashboard');
    Route::get('users/profile','\App\MaguttiCms\Website\Controllers\ReservedAreaController@profile');
});