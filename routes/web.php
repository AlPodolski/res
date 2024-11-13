<?php

use App\Http\Controllers\SiteController;
use Intervention\Image\ImageManager;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::domain('admin.' . env('DOMAIN'))->group(function () {
    Route::post('/api/post', 'Admin\Api\PostController@index');
});

Route::get('login', 'Auth\LoginController@showLoginForm')
    ->name('login');

Route::get('logout', 'Auth\LoginController@logout')
    ->name('logout');


Route::post('login', 'Auth\LoginController@login');

Route::get('register', 'Auth\RegistЛerController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

Auth::routes();

Route::post('/like', [\App\Http\Controllers\LikeController::class, 'index']);

Route::get('/{size}/thumbs/{path}', 'ImageController@index')
    ->where('size', '.*')->where('path', '.*');

Route::post('/comment/add', 'CommentController@add')->name('comment.add');
Route::post('/call/request', 'CallRequestController@index');

Route::get('/logout', [\App\Http\Controllers\Auth\LogoutController::class, 'index']);

Route::post('/claim/add', [\App\Http\Controllers\ClaimController::class, 'index']);

Route::post('/view/phone', [\App\Http\Controllers\ViewController::class, 'phone']);

Route::post('/beta/pay/success', [\App\Http\Controllers\BetaController::class, 'index']);

Route::middleware('redirect')->group(function () {

    Route::domain('{city}.' . SITE)->group(function () {

        Route::get('/prostitutki-na-karte', 'MapController@index');

        Route::middleware('auth')->group(function () {

            Route::get('/cabinet', [\App\Http\Controllers\Cabinet\IndexController::class, 'index']);

            Route::prefix('/cabinet')->group(function () {

                Route::resource('post', '\App\Http\Controllers\Cabinet\PostsController');
                Route::post('post/start-all', ['\App\Http\Controllers\Cabinet\PostsController', 'startAll']);

                Route::get('chat', ['\App\Http\Controllers\Cabinet\ChatController', 'index']);
                Route::post('chat', ['\App\Http\Controllers\Cabinet\ChatController', 'send']);

                Route::post('chat/file', ['\App\Http\Controllers\Cabinet\ChatController', 'file']);

                Route::post('post/up', ['\App\Http\Controllers\Cabinet\PostsController', 'up']);

                Route::post('post/publication', ['\App\Http\Controllers\Cabinet\PostsController', 'publication']);
                Route::get('pay', ['\App\Http\Controllers\Cabinet\PayController', 'index']);
                Route::post('pay/processing', ['\App\Http\Controllers\Cabinet\PayController', 'processing'])
                    ->middleware('captcha');

            });

        });

        Route::get('/', 'SiteController@index');

        Route::get('/pay/{id}', 'PayController@index');

        Route::post('/', 'SiteController@more');
        Route::post('/post/more', 'PostController@more')->name('post.more');
        Route::post('/post/check', 'PostController@check');
        Route::get('/post/{url}', 'PostController@index')->name('post.index');
        Route::get('/robots.txt', 'RobotController@index');
        Route::get('/search', 'SearchController@index');
        Route::get('/filter', 'SearchController@filter');
        Route::get('/sitemap.xml', 'SiteController@map');
        Route::get('/{search}', 'FilterController@index')->where('search', '.*');
        Route::post('/{search}', 'FilterController@more')->where('search', '.*');
    });

});

Route::get('/home', 'HomeController@index')->name('home');
