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

$api->version('v1', ['namespace' => '\App\Api\V1\Controllers'], function($api) {

    // JWT auth routes
    $api->post('auth/login', 'AuthController@login');
    $api->post('auth/signup', 'AuthController@signup');
    $api->post('auth/recovery', 'AuthController@recovery');
    $api->post('auth/reset', 'AuthController@reset');

    // Protected routes
    $api->group(['middleware' => 'api.auth'], function ($api) {

        // /bubblers
        $api->group(['prefix' => 'bubblers'], function ($api) {
            $api->get('/', 'BubblerController@index');
            $api->get('{id}', 'BubblerController@show');
        });
    });
});