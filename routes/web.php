<?php

use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index')->name('home');


// profile routes
Route::get('profile/{user}', 'ProfileController@index')->name('profile.index');
Route::get('profile/{user}/edit', 'ProfileController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfileController@update')->name('profile.update');
Route::post('book/{service}', 'OrdersController@store')->name('book.store');
Route::get('/cart/{user}','ProfileController@cart')->name('cart.index');
Route::delete('/cart/{order}','ProfileController@deleteItem')->name('cart.delete');
Route::get('/product-cart/{user}','ProfileController@productCart')->name('productCart.index');
// Route::get('add-to-cart/{id}','ProfileController@addItemToCart')->name('productCart.add');
Route::post('add-to-cart/{id}','ProfileController@addItemToCart')->name('productCart.add');
Route::get('remove-from-cart','ProfileController@removeItemFromCart')->name('productCart.remove');
Route::get('increase-quantity/{id}','ProfileController@incQuantity')->name('product.incQuantity');
Route::get('decrease-quantity/{id}','ProfileController@decQuantity')->name('product.decQuantity');
Route::get('/bill','ProfileController@bill')->name('product.bill');



// pages route
Route::get('/', 'PagesController@welcome')->name('pages.welcome');
Route::get('/about', 'PagesController@about')->name('pages.about');
Route::get('/contact', 'PagesController@contact')->name('pages.contact');
Route::get('/services', 'PagesController@services')->name('pages.services');
Route::get('services/{service}', 'PagesController@singleServices')->name('services.show');
Route::get('/product/{product}', 'PagesController@showProduct')->name('product.getSingle');
Route::get('/product', 'PagesController@allProducts')->name('product.index');




// admin routes
Route::get('admin/login','Auth\AdminLoginController@showLogin')->name('admin.showLogin');
Route::post('admin/login','Auth\AdminLoginController@login')->name('admin.login');
Route::get('admin/users','AdminController@users')->name('admin.users');
Route::get('/admin/orders','AdminController@orders')->name('orders.index');
Route::delete('/admin/orders/{order}','AdminController@deleteOrder')->name('orders.delete');
Route::resource('/admin/services','ServicesController')->except('show');
Route::resource('/admin/products','ProductsController');
Route::get('/admin', 'AdminController@index')->name('admin.index');




