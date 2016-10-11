<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/profile', 'HomeController@profile');
Route::resource('item', 'ItemController');
Route::get('/getitem/{name}', 'ItemController@getItembyName');
Route::get('/getcustomer/{name}', 'CustomerController@getCustomerbyName');
Route::resource('customer.invoices', 'InvoiceController');
Route::get('/newInvoice','InvoiceController@create');
Route::resource('customer', 'CustomerController');
Route::resource('user', 'UserController');
Route::get('/rol','UserController@rol');

