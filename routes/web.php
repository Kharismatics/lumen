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
// User
$router->post('/user_transactions', 'UserController@user_transactions');
// CRUD
$router->post('/users', 'UserController@index');
$router->post('/user', 'UserController@show');
$router->post('/user_store', 'UserController@store');
$router->post('/user_update', 'UserController@update');
$router->post('/user_delete', 'UserController@delete');
// CRUD
// End User
// Category
$router->post('/category_products', 'CategoryController@category_products');
// CRUD
$router->post('/categories', 'CategoryController@index');
$router->post('/category', 'CategoryController@show');
$router->post('/category_store', 'CategoryController@store');
$router->post('/category_update', 'CategoryController@update');
$router->post('/category_delete', 'CategoryController@delete');
// CRUD
// End Category
// Product
$router->post('/product_category', 'ProductController@product_category');
$router->post('/product_stocks', 'ProductController@product_stocks');
$router->post('/product_transactions', 'ProductController@product_transactions');
// CRUD
$router->post('/products', 'ProductController@index');
$router->post('/product', 'ProductController@show');
$router->post('/product_store', 'ProductController@store');
$router->post('/product_update', 'ProductController@update');
$router->post('/product_delete', 'ProductController@delete');
// CRUD
// End Product
// Stock
$router->post('/stock_product', 'StockController@stock_product');
// CRUD
$router->post('/stocks', 'StockController@index');
$router->post('/stock', 'StockController@show');
$router->post('/stock_store', 'StockController@store');
$router->post('/stock_update', 'StockController@update');
$router->post('/stock_delete', 'StockController@delete');
// CRUD
// End Stock
// Transaction
$router->post('/transaction_product', 'transactionController@transaction_product');
$router->post('/transaction_best_products', 'ProductController@transaction_best_products');
// CRUD
$router->post('/transactions', 'TransactionController@index');
$router->post('/transaction', 'TransactionController@show');
$router->post('/transaction_store', 'TransactionController@store');
$router->post('/transaction_update', 'TransactionController@update');
$router->post('/transaction_delete', 'TransactionController@delete');
// CRUD
// End Transaction