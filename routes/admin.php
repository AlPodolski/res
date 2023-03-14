<?php

Route::get('login', 'Admin\AuthController@index');
Route::post('login_process', 'Admin\AuthController@login');

Route::middleware('auth:admin')->group(function (){

    Route::get('/', 'Admin\IndexController@index');

    Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);

});
