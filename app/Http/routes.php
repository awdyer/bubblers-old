<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$api = app('Dingo\Api\Routing\Router');

Route::get('/', function() {
    return 'Sup.';
});

$api->version('v1', function($api) {

    // JWT auth routes
    $api->post('auth/login', '\App\Http\Controllers\AuthController@login');
    $api->post('auth/signup', '\App\Http\Controllers\AuthController@signup');
    $api->post('auth/recovery', '\App\Http\Controllers\AuthController@recovery');
    $api->post('auth/reset', '\App\Http\Controllers\AuthController@reset');

    // Protected routes
    $api->group(['middleware' => 'api.auth'], function ($api) {
        $api->get('/bubblers/{id}', '\App\Http\Controllers\BubblerController@show');
        $api->get('bubblers', '\App\Http\Controllers\BubblerController@index');
    });
});