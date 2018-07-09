<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->group(['prefix' => 'v1'], function () use ($app)
{

    $app->group(['prefix' => 'auth'], function () use ($app)
    {
        $app->post('login', 'AuthController@login');

        $app->group(['middleware' => App\Http\Middleware\AuthMiddleware::class], function () use ($app)
        {
            $app->post('logout', 'AuthController@logout');

            $app->post('refresh', 'AuthController@refresh');

            $app->get('check', 'AuthController@check');
        });

    });

    $app->group(['prefix' => 'iComment'], function () use ($app) {

        $app->group(['middleware' => App\Http\Middleware\AuthMiddleware::class], function () use ($app) {

            $app->post('mobileUser', 'MobileUserController@insertMobileUser');

            $app->post('mobileUser/{id}', 'MobileUserController@insertMobileUser');

            $app->post('userComment/{id}', 'MobileUserController@insertUserComment');

            $app->get('getuserComment/{lat}/{lon}', 'MobileUserController@getUserComment');
        });

    });

});

