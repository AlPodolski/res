<?php

Route::get('login', 'Admin\AuthController@index');
Route::post('login_process', 'Admin\AuthController@login');

Route::middleware('admin:admin')->group(function (){

    Route::get('/', 'Admin\IndexController@index');

    Route::resource('posts', 'Admin\PostController');

});
