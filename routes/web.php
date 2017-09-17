<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'WarehouseController@index')->middleware('auth');
Route::get('/home', 'HomeController@index');

Route::get('invoiceItemsByInvoiceId/{invoiceId}', 'InvoiceItemController@showInvoiceItemsByInvoiceId')->middleware('auth');

Route::get('/warehouse', 'WarehouseController@index')->middleware('auth');

Route::resource('imports', 'ImportController');

Route::resource('products', 'ProductController');

Route::resource('importItems', 'ImportItemController');

Route::resource('imports', 'ImportController');

Route::resource('customers', 'CustomerController');

Route::resource('taxes', 'TaxController');

Route::resource('invoices', 'InvoiceController');

Route::resource('invoiceItems', 'InvoiceItemController');