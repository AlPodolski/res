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

Auth::routes();

Route::get('/{size}/thumbs/{path}', 'ImageController@index')
    ->where('size', '.*')->where('path', '.*');

Route::post('/comment/add', 'CommentController@add')->name('comment.add');
Route::post('/call/request', 'CallRequestController@index');

Route::get('/logout', [\App\Http\Controllers\Auth\LogoutController::class, 'index']);

Route::post('/claim/add', [\App\Http\Controllers\ClaimController::class, 'index']);

Route::domain('{city}.'.env('DOMAIN'))->group(function () {

    Route::middleware('auth' )->group(function(){

        Route::get('/cabinet', [\App\Http\Controllers\Cabinet\IndexController::class, 'index']);

        Route::prefix('/cabinet')->group(function(){

            Route::resource('post', '\App\Http\Controllers\Cabinet\PostsController');
            Route::get('pay', ['\App\Http\Controllers\Cabinet\PayController', 'index']);
            Route::post('pay/processing', ['\App\Http\Controllers\Cabinet\PayController', 'processing']);

        });

    });

    Route::get('/',  'SiteController@index');
    Route::post('/',  'SiteController@more');
    Route::post('/post/more',  'PostController@more')->name('post.more');
    Route::get('/post/{url}',  'PostController@index')->name('post.index');
    Route::get('/robots.txt',  'RobotController@index');
    Route::get('/search',  'SearchController@index');
    Route::get('/filter',  'SearchController@filter');
    Route::get('/sitemap.xml',  'SiteController@map');
    Route::get('/{search}',  'FilterController@index')->where('search', '.*');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
