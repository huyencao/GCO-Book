<?php
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

Route::namespace('Admin')->group(function(){
    Route::get('admin', 'DashboardController@index');
});
Route::namespace('Frontend')->group(function(){
   Route::get('/', 'HomeController@index');
   Route::get('about', 'AboutController@index')->name('about');
   Route::get('contact', 'ContactController@index')->name('contact');
   Route::get('news', 'NewsController@index')->name('news');
   Route::get('news-detail/{slug}', 'NewsController@detail')->name('news.detail');
   Route::get('product', 'ProductController@index')->name('product');
   Route::get('product-detail/{slug}', 'ProductController@detail')->name('product.detail');
});
