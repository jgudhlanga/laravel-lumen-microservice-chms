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
    return "Welcome to the CHMS Microservice  build with ( ". $app->version()." )" ;
});

$app->group(['prefix' => 'api/v1'], function($app)
{
    $app->post('login', 'AuthController@auth');
    $app->get('todos', 'TodoController@index');
    $app->post('todos', 'TodoController@store');
    $app->get('todos/{id}', 'TodoController@show');
    $app->put('todos/{id}', 'TodoController@update');
    $app->delete('todos/{id}', 'TodoController@destroy');
    
});
