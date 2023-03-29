<?php

Route::get('login', 'Admin\AuthController@index');
Route::post('login_process', 'Admin\AuthController@login');

Route::middleware('admin:admin')->group(function (){

    Route::get('/', 'Admin\IndexController@index');

    Route::post('/post/delete', 'Admin\PostController@delete');

    Route::resource('posts', 'Admin\PostController');

    Route::post('/posts/check', 'Admin\PostController@check');

});
