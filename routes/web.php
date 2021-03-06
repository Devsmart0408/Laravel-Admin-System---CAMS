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

Route::get('/', function () {
    return view('auth/login');
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('pages-logout', 'DashboardController@logout');
    Route::get('home', 'DashboardController@index');
    
    Route::get('customers', 'CustomerController@index');
    Route::get('cases', 'CasesController@index');
    Route::get('currency', 'CurrencyController@index');
    Route::get('transactions', 'TransactionController@index');
    
    Route::resource('customers','CustomerController');
    Route::resource('cases','CasesController');
    Route::resource('currency','CurrencyController');
    Route::resource('transactions','TransactionController');

    Route::get('{any}', 'MintonController@index');


});

