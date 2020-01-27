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

$router->post('/HeaderContent', 'MainController@HeaderContent');
$router->post('/model_testing', 'MainController@model_testing');
$router->post('/main_user', 'MainController@main_user');
$router->post('/user_transactions', 'MainController@user_transactions');
$router->post('/transaction_product', 'MainController@transaction_product');
$router->post('/transaction_best_product', 'MainController@transaction_best_product');
$router->post('/stock_product', 'MainController@stock_product');
$router->post('/category_products', 'MainController@category_products');
$router->post('/product_category', 'MainController@product_category');
$router->post('/product_stocks', 'MainController@product_stocks');
$router->post('/product_transactions', 'MainController@product_transactions');

// CRUD ========================================================================
// User
$router->post('/users', 'UserController@index');
$router->post('/user', 'UserController@show');
$router->post('/user_store', 'UserController@store');
$router->post('/user_update', 'UserController@update');
$router->post('/user_delete', 'UserController@delete');
// End User
// Category
$router->post('/categories', 'CategoryController@index');
$router->post('/category', 'CategoryController@show');
$router->post('/category_store', 'CategoryController@store');
$router->post('/category_update', 'CategoryController@update');
$router->post('/category_delete', 'CategoryController@delete');
// End Category
// Product
$router->post('/products', 'ProductController@index');
$router->post('/product', 'ProductController@show');
$router->post('/product_store', 'ProductController@store');
$router->post('/product_update', 'ProductController@update');
$router->post('/product_delete', 'ProductController@delete');
// End Product
// Stock
$router->post('/stocks', 'StockController@index');
$router->post('/stock', 'StockController@show');
$router->post('/stock_store', 'StockController@store');
$router->post('/stock_update', 'StockController@update');
$router->post('/stock_delete', 'StockController@delete');
// End Stock
// Transaction
$router->post('/transactions', 'TransactionController@index');
$router->post('/transaction', 'TransactionController@show');
$router->post('/transaction_store', 'TransactionController@store');
$router->post('/transaction_update', 'TransactionController@update');
$router->post('/transaction_delete', 'TransactionController@delete');
// End Transaction
// CRUD ======================================================================