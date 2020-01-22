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

$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->post('/HeaderContent', 'ExampleController@HeaderContent');
$router->post('/model_testing', 'ExampleController@model_testing');

$router->post('/user', 'MainController@user');

$router->post('/category_products', 'CategoryController@category_products');

$router->post('/product_category', 'ProductController@product_category');
