<?php
Route::group(['namespace' => 'Cashier', 'middleware' => 'cashier'], function () {
    Route::get('cashier/home', 'HomeController@index')->name('cashier.home');
    Route::resource('cashier/product', 'HomeController');
    Route::post('cashier/store', ['as' => 'cashier.product.store', 'uses' => 'HomeController@store']);
    Route::get('cashier/getinfo/{id}', 'HomeController@getInfo');

    Route::get('/refund/', ['as' => 'refund', 'uses' => 'RefundController@getInfo']);
    Route::get('/refundrem/{id}/{q}', ['as' => 'refundrem', 'uses' => 'RefundController@remainingstock']);
    Route::get('/refundproduct/{id}/{q}/{t}', ['as' => 'refundproduct', 'uses' => 'RefundController@refundproduct']);


    Route::get('cashier/print', 'PrintController@index');

    Route::resource('cashier/refund', 'RefundController');
});


Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::get('admin/home', 'HomeController@index')->name('admin.home');

    Route::resource('admin/report', 'ReportController');

    Route::resource('admin/product', 'ProductController');

    Route::resource('admin/stock',  'StockController');


    Route::resource('admin/cashier', 'CashierController');

    Route::resource('admin/category', 'CategoryController');
});


// Route::get('/home', 'Auth\LoginController@index');
//Route::get('/admin', 'Auth\AdminController@index');
Route::get('/', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);

Route::post('/', 'Auth\LoginController@login');
Route::post('/register/user', 'Auth\RegisterController@registerPost');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/forbidden', ['as' => 'forbidden', 'uses' => 'Auth\LoginController@forbidden']);

//facebook socialite
Route::get('login/facebook', ['as' => 'facebook', 'uses' => 'Auth\LoginController@redirectToProvider']);
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');
