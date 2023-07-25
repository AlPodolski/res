<?php

Route::get('login', 'Admin\AuthController@index');
Route::post('login_process', 'Admin\AuthController@login');

Route::middleware('admin:admin')->group(function (){

    Route::get('/', 'Admin\IndexController@index');

    Route::get('/claim', 'Admin\ClaimController@index');
    Route::get('/claim/delete', 'Admin\ClaimController@delete');

    Route::post('/comments/delete', 'Admin\CommentController@delete');
    Route::post('/comments/check', 'Admin\CommentController@check');
    Route::resource('comments', 'Admin\CommentController');

    Route::resource('users', 'Admin\UserController');

    Route::resource('posts', 'Admin\PostController');
    Route::post('/post/delete', 'Admin\PostController@delete');
    Route::post('/posts/check', 'Admin\PostController@check');

});


