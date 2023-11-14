<?php

Route::get('login', 'Admin\AuthController@index');
Route::post('login_process', 'Admin\AuthController@login');

Route::middleware('admin:admin')->group(function (){

    Route::get('/', 'Admin\IndexController@index');

    Route::post('phone/update', 'Admin\PhoneController');

    Route::resource('obmenka', 'Admin\ObmenkaController');
    Route::get('/obmenka/user/{id}', 'Admin\ObmenkaController@user');

    Route::get('/claim', 'Admin\ClaimController@index');
    Route::get('/claim/delete', 'Admin\ClaimController@delete');

    Route::get('/cache', 'Admin\CacheController@index');

    Route::get('/chat', 'Admin\ChatController@index');
    Route::post('/chat/get', 'Admin\ChatController@get');
    Route::post('/chat/send', 'Admin\ChatController@send');


    Route::post('/comments/delete', 'Admin\CommentController@delete');
    Route::post('/comments/check', 'Admin\CommentController@check');
    Route::resource('comments', 'Admin\CommentController');

    Route::resource('users', 'Admin\UserController');

    Route::resource('posts', 'Admin\PostController');
    Route::post('/post/delete', 'Admin\PostController@delete');
    Route::post('/posts/check', 'Admin\PostController@check');

});


