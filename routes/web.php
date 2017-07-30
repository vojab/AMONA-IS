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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('imports', 'ImportController');

Route::resource('products', 'ProductController');

Route::resource('importItems', 'ImportItemController');

Route::resource('imports', 'ImportController');

Route::resource('customers', 'CustomerController');

Route::resource('taxes', 'TaxController');

Route::resource('invoices', 'InvoiceController');

Route::resource('invoiceItems', 'InvoiceItemController');

Route::get('invoiceItemsByInvoiceId/{invoiceId}', 'InvoiceItemController@showInvoiceItemsByInvoiceId');
