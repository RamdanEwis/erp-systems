<?php

/*
|--------------------------------------------------------------------------
| Web Routescategories
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::resource('categories', 'CategoryController')->middleware('auth');
Route::resource('invoices', 'InvoiceController')->middleware('auth');
Route::resource('invoiceBuy', 'InvoiceBuyController')->middleware('auth');
Route::resource('products', 'ProductController')->middleware('auth');
Route::resource('clients', 'ClientController')->middleware('auth');
Route::resource('suppliers', 'SupplierController')->middleware('auth');


Route::post('clients/Payment_supplier', 'ClientController@Payment')->middleware('auth')->name('Payment_clients');
Route::post('supplier/Payment_supplier', 'SupplierController@Payment')->middleware('auth')->name('Payment_supplier');
Route::get('/category/{id}', 'InvoiceController@getprouduct') ;
Route::get('/{page}', 'AdminController@index')->middleware('auth') ;




