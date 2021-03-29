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


Route::get('/', 'App\Http\Controllers\ProductController@getProduct')->name('get-product');

Route::group(['prefix' => 'urun'],function () {
    Route::get('/', 'App\Http\Controllers\ProductController@getProduct')->name('get-product');
    Route::get('listele', 'App\Http\Controllers\ProductController@getProduct')->name('get-product');
    Route::get('guncelle/{id}' , 'App\Http\Controllers\ProductController@getProductForm')->name('get-product-arrangement');
    Route::get('yeni-urun','App\Http\Controllers\ProductController@getProductForm')->name('get-product-new');
    Route::post('kaydet/{id}', 'App\Http\Controllers\ProductController@postProductCreated')->name('post-product-created');
    Route::get('sil/{id}', 'App\Http\Controllers\ProductController@getDeleteProduct')->name('get-delete-product');
});

Route::group(['prefix' => 'personel'],function () {
    Route::get('listele', 'App\Http\Controllers\PersonController@getPerson')->name('get-person');
    Route::get('guncelle/{id}' , 'App\Http\Controllers\PersonController@getPersonForm')->name('get-person-arrangement');
    Route::get('yeni-kisi','App\Http\Controllers\PersonController@getPersonForm')->name('get-person-new');
    Route::post('kaydet/{id}', 'App\Http\Controllers\PersonController@postPersonCreated')->name('post-person-created');
    Route::get('sil/{id}', 'App\Http\Controllers\PersonController@getDeletePerson')->name('get-delete-person');
});


