<?php

use App\Events\TaskEvent;
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
    // dd(date("F j, Y, g:i a"));
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'users'], function () {
    Route::get('/create',      'UserController@create')->name('users.create');
    // ->middleware('role_or_permission:admin');
    Route::post('/store',      'UserController@store')->name('users.store');
    // ->middleware('role_or_permission:admin');
    Route::get('/manage',      'UserController@manage')->name('users.manage');
    // ->middleware('role_or_permission:admin|data entry|operator');
    Route::get('/edit/{id}',   'UserController@edit')->name('users.edit');
    // ->middleware('role_or_permission:admin');
    Route::post('/update',     'UserController@update')->name('users.update');
    // ->middleware('role_or_permission:admin');
    Route::get('/delete/{id}', 'UserController@delete')->name('users.delete');
    // ->middleware('role_or_permission:admin');
});

Route::group(['prefix' => 'categories'], function () {
    Route::get('/create',      'CategoryController@create')->name('categories.create');
    // ->middleware('role_or_permission:admin|data entry');
    Route::post('/store',      'CategoryController@store')->name('categories.store');
    // ->middleware('role_or_permission:admin|data entry');
    Route::get('/manage',      'CategoryController@manage')->name('categories.manage');
    // ->middleware('role_or_permission:admin|data entry|operator');
    Route::get('/edit/{id}',   'CategoryController@edit')->name('categories.edit');
    // ->middleware('role_or_permission:admin|data entry');
    Route::post('/update',     'CategoryController@update')->name('categories.update');
    // ->middleware('role_or_permission:admin|data entry');
    Route::get('/delete/{id}', 'CategoryController@delete')->name('categories.delete');
    // ->middleware('role_or_permission:admin|data entry');
});

Route::group(['prefix' => 'products'], function () {
    Route::get('/create',      'ProductController@create')->name('products.create');
    // ->middleware('role_or_permission:admin|data entry');
    Route::post('/store',      'ProductController@store')->name('products.store');
    // ->middleware('role_or_permission:admin|data entry');
    Route::get('/manage',      'ProductController@manage')->name('products.manage');
    // ->middleware('role_or_permission:admin|data entry|operator');
    Route::get('/edit/{id}',   'ProductController@edit')->name('products.edit');
    // ->middleware('role_or_permission:admin|data entry');
    Route::post('/update',     'ProductController@update')->name('products.update');
    // ->middleware('role_or_permission:admin|data entry');
    Route::get('/delete/{id}', 'ProductController@delete')->name('products.delete');
    // ->middleware('role_or_permission:admin|data entry');
    Route::get('/view/{id}', 'ProductController@view')->name('products.view');
    // ->middleware('role_or_permission:admin|data entry|operator');
});

Route::group(['prefix' => 'stocks'], function () {
    Route::get('/create',      'StockController@create')->name('stocks.create');
    // ->middleware('role_or_permission:admin|data entry');
    Route::post('/store',      'StockController@store')->name('stocks.store');
    // ->middleware('role_or_permission:admin|data entry');
    Route::get('/manage',      'StockController@manage')->name('stocks.manage');
    // ->middleware('role_or_permission:admin|data entry|operator');
    Route::get('/edit/{id}',   'StockController@edit')->name('stocks.edit');
    // ->middleware('role_or_permission:admin|data entry');
    Route::post('/update',     'StockController@update')->name('stocks.update');
    // ->middleware('role_or_permission:admin|data entry');
    Route::get('/delete/{id}', 'StockController@delete')->name('stocks.delete');
    // ->middleware('role_or_permission:admin|data entry');
    
});

Route::group(['prefix' => 'currentStocks'], function () {
    Route::get('/view',      'CurrentStockController@view')->name('currentStocks.view');
    // ->middleware('role_or_permission:admin|data entry|operator');
    
});

Route::group(['prefix' => 'vendors'], function () {
    Route::get('/create',      'VendorController@create')->name('vendors.create');
    // ->middleware('role_or_permission:admin|data entry');
    Route::post('/store',      'VendorController@store')->name('vendors.store');
    // ->middleware('role_or_permission:admin|data entry');
    Route::get('/manage',      'VendorController@manage')->name('vendors.manage');
    // ->middleware('role_or_permission:admin|data entry|operator');
    Route::get('/edit/{id}',   'VendorController@edit')->name('vendors.edit');
    // ->middleware('role_or_permission:admin|data entry');
    Route::post('/update',     'VendorController@update')->name('vendors.update');
    // ->middleware('role_or_permission:admin|data entry');
    Route::get('/delete/{id}', 'VendorController@delete')->name('vendors.delete');
    // ->middleware('role_or_permission:admin|data entry');
    
});

Route::group(['prefix' => 'damageStocks'], function () {
    Route::get('/create',      'DamageStockController@create')->name('damageStocks.create');
    // ->middleware('role_or_permission:admin|data entry');
    Route::post('/store',      'DamageStockController@store')->name('damageStocks.store');
    // ->middleware('role_or_permission:admin|data entry');
    Route::get('/manage',      'DamageStockController@manage')->name('damageStocks.manage');
    // ->middleware('role_or_permission:admin|data entry|operator');
    Route::get('/edit/{id}',   'DamageStockController@edit')->name('damageStocks.edit');
    // ->middleware('role_or_permission:admin|data entry');
    Route::post('/update',     'DamageStockController@update')->name('damageStocks.update');
    // ->middleware('role_or_permission:admin|data entry');
    Route::get('/delete/{id}', 'DamageStockController@delete')->name('damageStocks.delete');
    // ->middleware('role_or_permission:admin|data entry');
    
});

Route::group(['prefix' => 'posIndex'], function () {
    Route::get('/view', 'PosIndexController@view')->name('posIndex.view');
    // ->middleware('role_or_permission:admin|operator');
    Route::get('/index', 'PosIndexController@index')->name('posIndex.index');
    // ->middleware('role_or_permission:admin|operator');
    Route::get('/search', 'PosIndexController@searchproduct')->name('posIndex.searchproduct');
    // ->middleware('role_or_permission:admin|operator');
    
});

Route::get('/sync', 'SyncController@sync')->name('Sync.sync');

Route::post('/posIndex/invoice/', 'InvoiceController@invoice')->name('Invoice.invoice');
// ->middleware('role_or_permission:admin|data entry|operator');
Route::post('/posIndex/saleData/', 'SaleController@saleData')->name('saleData.saleData');
// ->middleware('role_or_permission:admin|data entry|operator');

Route::get('event', function(){
    // dd('hhh');
    event(new TaskEvent("Shouting!"));
});

Route::get('listen', function(){
    return view('listenBroadcast');
});