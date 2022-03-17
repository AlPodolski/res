<?php

use App\Http\Controllers\SiteController;

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

Route::domain('{city}.pr.loc')->group(function () {
    Route::get('/',  'SiteController@index');
    Route::get('/post/{url}',  'PostController@index')->name('post.index');
});
