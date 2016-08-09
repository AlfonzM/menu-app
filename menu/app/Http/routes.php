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

// for testing only
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'api'], function(){
    Route::group(['prefix' => 'v1'], function() {
        
        // Categories
        Route::resource('categories', 'CategoryController');
        Route::resource('categories.subcategories', 'CategorySubcategoryController');
        // Route::resource('categories/{id}/subcategories', 'CategoryController@subcategories');

        // Settings
        Route::resource('settings', 'SettingController');
        Route::resource('settings/{id}/images', 'SettingController@images');

        // Products
        Route::resource('products', 'ProductController');
        Route::resource('products/{id}/images', 'ProductController@images');
        Route::resource('products/{id}/videos', 'ProductController@videos');

        // Counts
        Route::get('/counts', function(){
            $productCount = App\Product::all()->count();
            $categoryCount = App\Category::all()->count();
            $subcategoryCount = App\Subcategory::all()->count();

            return compact(['productCount', 'categoryCount', 'subcategoryCount']);
        });
    });
});


Route::get('/token', function(){
	return csrf_token();
});

Route::get('/files/{filename}', function($filename){
	$path = storage_path() . '/app/files/' . $filename;

	if(!File::exists($path)) {
		return response()->json(['message' => 'Image not found.'], 404);
	}

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;

});