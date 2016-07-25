<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Categories
Route::resource('categories', 'CategoryController');
Route::resource('categories/{id}/subcategories', 'CategoryController@subcategories');

// Subcategories
Route::resource('subcategories', 'SubcategoryController');

// Settings
Route::resource('settings', 'SettingController');
Route::resource('settings/{id}/images', 'SettingController@images');

// Products
Route::resource('products', 'ProductController');
Route::resource('products/{id}/images', 'ProductController@images');
Route::resource('products/{id}/videos', 'ProductController@videos');