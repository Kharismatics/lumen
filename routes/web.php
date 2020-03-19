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
// View =========================================================================
$router->get('/dashboard', 'ViewController@dashboard');
$router->get('/users', 'ViewController@users');
$router->get('/categories', 'ViewController@categories');
$router->post('/form', 'ViewController@form');
// End View =====================================================================
// Data Factory =================================================================
$router->post('/main_user', 'MainController@main_user');
$router->post('/upcoming_orders', 'MainController@upcoming_orders');
$router->post('/inprogress_orders', 'MainController@inprogress_orders');
$router->post('/completed_orders', 'MainController@completed_orders');
$router->post('/total_orders', 'MainController@total_orders');
$router->post('/total_products', 'MainController@total_products');
$router->post('/total_categories', 'MainController@total_categories');
$router->post('/total_customers', 'MainController@total_customers');
$router->post('/total_stocks', 'MainController@total_stocks');
$router->post('/best_product_chart', 'MainController@best_product_chart');
$router->post('/best_customer_chart', 'MainController@best_customer_chart');
$router->post('/sales_byprice_chart', 'MainController@sales_byprice_chart');
$router->post('/sales_byquantity_chart', 'MainController@sales_byquantity_chart');
$router->post('/in_out_stocks_chart', 'MainController@in_out_stocks_chart');
// End Data Factory =============================================================
// CRUD =========================================================================
// User
$router->post('/users', 'UserController@index');
$router->post('/user', 'UserController@show');
$router->post('/users_store', 'UserController@store');
$router->post('/users_update', 'UserController@update');
$router->post('/users_delete', 'UserController@delete');
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
// End CRUD =====================================================================