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
$router->post('/form', 'ViewController@form');
$router->get('/users', 'ViewController@users');
$router->get('/products', 'ViewController@products');
$router->get('/categories', 'ViewController@categories');
$router->get('/stocks', 'ViewController@stocks');
$router->get('/transactions', 'ViewController@transactions');
// End View =====================================================================
// Data Core =================================================================
$router->post('/main_user', 'MainController@main_user');
// Data Core =================================================================
// Data Factory =================================================================
$router->post('/upcoming_orders', 'DataController@upcoming_orders');
$router->post('/inprogress_orders', 'DataController@inprogress_orders');
$router->post('/completed_orders', 'DataController@completed_orders');
$router->post('/total_orders', 'DataController@total_orders');
$router->post('/total_products', 'DataController@total_products');
$router->post('/total_categories', 'DataController@total_categories');
$router->post('/total_customers', 'DataController@total_customers');
$router->post('/total_stocks', 'DataController@total_stocks');
$router->post('/best_product_chart', 'DataController@best_product_chart');
$router->post('/best_customer_chart', 'DataController@best_customer_chart');
$router->post('/sales_byprice_chart', 'DataController@sales_byprice_chart');
$router->post('/sales_byquantity_chart', 'DataController@sales_byquantity_chart');
$router->post('/in_out_stocks_chart', 'DataController@in_out_stocks_chart');
$router->post('/budget_x_sales', 'DataController@budget_x_sales');
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