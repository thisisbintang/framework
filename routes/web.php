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

Route::redirect('/', '/cashier');

Auth::routes();

Route::prefix('employee')->group(function () {
    Route::post('login', 'Auth\Employee\LoginController@login');
    Route::get('login', 'Auth\Employee\LoginController@showLoginForm')->name('employee.login');
    Route::post('logout', 'Auth\Employee\LoginController@logout')->name('employee.logout');
    Route::post('register', 'Auth\Employee\RegisterController@register');
    Route::get('register', 'Auth\Employee\RegisterController@showRegistrationForm')->name('employee.register');
    Route::get('home', 'Employee\HomeController@index')->name('employee.home');
    Route::get('/', 'Employee\HomeController@index');
    Route::resource('goods', 'GoodsController');
    Route::resource('stocks', 'StocksController');
});

Route::prefix('cashier')->group(function () {
    Route::post('login', 'Auth\Cashier\LoginController@login');
    Route::get('login', 'Auth\Cashier\LoginController@showLoginForm')->name('cashier.login');
    Route::post('logout', 'Auth\Cashier\LoginController@logout')->name('cashier.logout');
    Route::post('register', 'Auth\Cashier\RegisterController@register');
    Route::get('register', 'Auth\Cashier\RegisterController@showRegistrationForm')->name('cashier.register');
    Route::get('home', 'Cashier\HomeController@index')->name('cashier.home');
    Route::get('/', 'Cashier\HomeController@index');
    Route::resource('transactions', 'TransactionsController');
    Route::get('transaction-report', 'TransactionReportController@index')->name('transaction-report.index');
    Route::get('transaction-report/export-pdf', 'TransactionReportController@exportPDF')->name('transaction-report.export-pdf');
});

