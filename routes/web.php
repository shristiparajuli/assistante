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
Route::get('/admin', 'AdminController@index')->name('admin.index');
Route::resource('/admin/services','ServicesController')->except('show');
Route::get('/', 'PagesController@welcome')->name('pages.welcome');
Route::get('/about', 'PagesController@about')->name('pages.about');
Route::get('/contact', 'PagesController@contact')->name('pages.contact');
Route::get('/services', 'PagesController@services')->name('pages.services');
Route::get('services/{service}', 'PagesController@singleServices')->name('services.show');
Route::get('profile/{user}', 'ProfileController@index')->name('profile.index');
Route::get('profile/{user}/edit', 'ProfileController@edit')->name('profile.edit');
// :v
Route::patch('/profile/{user}', 'ProfileController@update')->name('profile.update');
