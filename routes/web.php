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
Route::get('invoiceSale/print/{id}', 'InvoiceSaleController@print')->name('invoiceSale.print') ;
Route::get('invoiceSale/pdf/{id}', 'InvoiceSaleController@pdf')->name('invoiceSale.pdf') ;
Route::resource('invoicesSale', 'InvoiceSaleController')->middleware('auth');
Route::get('invoiceBuy/print/{id}', 'InvoiceBuyController@print')->name('invoiceBuy.print') ;
Route::get('invoiceBuy/pdf/{id}', 'InvoiceBuyController@pdf')->name('invoiceBuy.pdf') ;
Route::resource('invoiceBuy', 'InvoiceBuyController')->middleware('auth');
Route::resource('products', 'ProductController')->middleware('auth');
Route::resource('clients', 'ClientController')->middleware('auth');
Route::resource('suppliers', 'SupplierController')->middleware('auth');


Route::post('clients/Payment_supplier', 'ClientController@Payment')->middleware('auth')->name('Payment_clients');
Route::post('supplier/Payment_supplier', 'SupplierController@Payment')->middleware('auth')->name('Payment_supplier');

Route::get('/category/{id}', 'InvoiceBuyController@getprouduct') ;
Route::group(['middleware' => ['auth']], static function() {
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
});
Route::get('/{page}', 'AdminController@index')->middleware('auth') ;


