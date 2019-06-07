<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('user', 'UserController', [
    'except' => ['edit', 'create']
]);

Route::resource('post', 'PostController', [
    'except' => ['index', 'edit', 'create']
]);

Route::resource('comment', 'CommentController', [
    'only' => ['store', 'show', 'destroy']
]);

Route::resource('like', 'LikeController', [
    'only' => ['store', 'destroy']
]);

Route::resource('tag', 'TagController', [
    'only' => ['store', 'index']
]);

Route::get('search', 'SearchController@search')->name('search');

Route::get('user/verify-email/{token}', 'UserController@verify')->name('verify');
Route::get('user/{user}/resend-verification', 'UserController@resend')->name('resend');

Route::post('login', 'AuthController@login')->name('login')
                                            ->middleware('api');