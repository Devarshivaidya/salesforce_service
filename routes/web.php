<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product\ProductController;
use App\Models\Product;


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
        $products = Product::all();
        return view('welcome')->with('products',$products);
});

Route::get('/products/{product}', [App\Http\Controllers\HomeController::class, 'show'])->name('show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/approval', 'App\Http\Controllers\HomeController@approval')->name('approval')->middleware('auth');

Route::get('/salesmanager', 'App\Http\Controllers\Salesmanager\SalesManagerController@index')->name('salesmanager')->middleware('auth','salesmanager','approved');
Route::group([
    'prefix' => 'salesmanager',
    'as' => 'salesmanager.',
    'middleware'=>['auth','salesmanager','approved']
], function () {
    Route::get('/distributor', 'App\Http\Controllers\Salesmanager\SalesManagerController@distributor')->name('distributor');
    Route::get('/salesmen', 'App\Http\Controllers\Salesmanager\SalesManagerController@salesmen')->name('salesmen');
    Route::get('/products', 'App\Http\Controllers\Salesmanager\SalesManagerController@productlist')->name('productlist');
    Route::get('/products/{product}/report', 'App\Http\Controllers\Salesmanager\SalesManagerController@productreport')->name('productreport');
    Route::get('/distributor/{distributor}/report', 'App\Http\Controllers\Salesmanager\SalesManagerController@distributorreport')->name('distributorreport');
    Route::get('/salesmen/{salesmen}/report', 'App\Http\Controllers\Salesmanager\SalesManagerController@salesmenreport')->name('salesmenreport');



});

Route::group([
    'prefix' => 'salesmen',
    'as' => 'salesmen.',
    'middleware'=>['auth','salesmen','approved']
], function () {
    Route::get('/', 'App\Http\Controllers\Salesmen\SalesmenController@index')->name('index');
   Route::group([
        'prefix' =>'selling',
        'as' => 'selling.',   
   ], function(){
    Route::get('/index', 'App\Http\Controllers\Salesmen\SalesmenSellingController@index')->name('index');
    Route::get('/create', 'App\Http\Controllers\Salesmen\SalesmenSellingController@create')->name('create');
    Route::post('/store', 'App\Http\Controllers\Salesmen\SalesmenSellingController@store')->name('store');
    Route::get('/{sales}', 'App\Http\Controllers\Salesmen\SalesmenSellingController@show')->name('show');
    Route::get('/{sales}/edit', 'App\Http\Controllers\Salesmen\SalesmenSellingController@edit')->name('edit');
    Route::post('/{sales}/update', 'App\Http\Controllers\Salesmen\SalesmenSellingController@update')->name('update');
    Route::get('/{sales}/delete', 'App\Http\Controllers\Salesmen\SalesmenSellingController@destroy')->name('destroy');
    });
 });

Route::group([
    'prefix' => 'superadmin',
    'as' => 'superadmin.',
    'middleware'=>['auth','superadmin']
], function () {
    Route::get('/', 'App\Http\Controllers\Superadmin\SuperAdminController@index')->name('index');
    Route::get('/approve/{id}','App\Http\Controllers\Superadmin\SuperAdminController@approve')->name('approve');
    Route::resource('products', 'App\Http\Controllers\Superadmin\Product\ProductController');
    Route::get('products/{product}/block', 'App\Http\Controllers\Superadmin\Product\ProductController@block')->name('products.block');
    Route::get('products/{product}/active', 'App\Http\Controllers\Superadmin\Product\ProductController@active')->name('products.active');
});
