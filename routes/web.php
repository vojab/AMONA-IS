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

// Landing

Route::get('/home', [
    'as' => 'home',
    'uses' => 'HomeController@index']);

Route::get('/', [
    'as' => 'landing',
    'uses' => 'WarehouseController@index'])->middleware('auth');

// Warehouse

Route::get('/warehouse', [
    'as' => 'warehouse',
    'uses' => 'WarehouseController@index'])->middleware('auth');

// Customers

Route::resource('customers', 'CustomerController');

// Products

Route::resource('products', 'ProductController');

// Taxes

Route::resource('taxes', 'TaxController');

// Imports

Route::resource('imports', 'ImportController');

Route::resource('importItems', 'ImportItemController');

Route::get('importItemsByImportId/{invoiceId}', [
    'as' => 'importItemsByImportId',
    'uses' => 'ImportItemController@showImportItemsByImportId'])->middleware('auth');

// Invoices

Route::resource('invoices', 'InvoiceController');

Route::resource('invoiceItems', 'InvoiceItemController');

Route::get('invoiceItemsByInvoiceId/{invoiceId}', [
    'as' => 'invoiceItemsByInvoiceId',
    'uses' => 'InvoiceItemController@showInvoiceItemsByInvoiceId'])->middleware('auth');

Route::get('createInvoiceItem/{invoiceId}', [
    'as' => 'createInvoiceItem',
    'uses' => 'InvoiceItemController@createInvoiceItem'])->middleware('auth');