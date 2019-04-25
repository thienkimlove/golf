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

Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('logout', 'AuthController@logout');
    Route::get('me', 'AuthController@me');
    Route::post('refresh', 'AuthController@refresh');
    Route::apiResource('categories', 'CategoryController');
});