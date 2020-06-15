<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Route::get('/logout', 'Auth\LoginController@logout' )->name('getlogout');
Route::middleware(['auth'])->group(function(){
Route::group([
    'prefix' => 'person',
    'namespace' => 'Person',
    'as' => 'person.'
], function () {
    Route::get('/orders', 'OrderController@index')->name('orders.index');
    Route::get('/order/{order}', 'OrderController@show')->name('orders.show');
});
Route::group( ['namespace' => 'Admin',
              'prefix' => 'admin'], function () {
Route::group(['middleware' => 'is_admin'], function () {
    
    Route::get('/orders', 'OrderController@index')->name('home');
    Route::get('/order/{order}', 'OrderController@show')->name('orders.show');
     
});
    Route::resource('categories', 'CategoryController');
    Route::resource('products', 'ProductController');  
});
});

Route::get('/', 'FrontPageController@front_page')->name('index');
Route::get('/categories', 'FrontPageController@categories')->name('categories');
Route::group(['middleware' => 'basket_is_not_empty',
               'prefix' => 'basket'
], function () {
    Route::get('/', 'BasketController@basket')->name('basket');
Route::get('/place', 'BasketController@basketPlace')->name('basketPlace');

Route::post('/remove/{product}', 'BasketController@basketRemove')->name('basketRemove');
Route::post('/place', 'BasketController@basketConfirm')->name('basketConfirm');
});
Route::post('/basket/add/{product}', 'BasketController@basketAdd')->name('basketAdd');
 Route::get('/{category}', 'FrontPageController@category')->name('category');
Route::get('/{category}/{product}', 'FrontPageController@product')->name('product');



 
