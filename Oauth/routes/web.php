<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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


/**
 * group of routes with api as prefix
 * @param $router
 */
$router->group(['prefix' => 'api'], static function ($router) {
    // Matches "/api/register
    $router->post('register', 'AuthController@register');
    //    Matches "/api/login"
    $router->post('login', 'AuthController@Login');
});

/**
 * Group of Authenticated Routes with api and Middleware
 * @param $router
 */
$router->group(['middleware' => "auth", 'prefix' => 'api'], static function ($router) {
//    Matches "api/user"
    $router->get('user', 'AuthController@Profile');
//    Matches "api/users
    $router->get('users', 'AuthController@AllUsers');
//    Matches "api/user/id
    $router->get('user/{id}', 'AuthController@singleUser');
//    Matches "api/logout
    $router->post('logout', 'AuthController@logout');

});
