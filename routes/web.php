<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','FrontEndController@index');
Route::match(['get','post'],'/admin_login','AdminController@login');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/products/{url}','ProductController@products');
// Product Detail Page
Route::get('/product/{id}','ProductController@product_detail');
//get product attribute price
Route::get('/get-product-price','ProductController@getProductPrice');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin/dashboard','AdminController@dashboard');
    Route::get('/admin/settings','AdminController@setting');
    Route::get('/admin/checkPassword','AdminController@checkPassword');
    Route::match(['get','post'],'/admin/updatePassword','AdminController@updatePassword');

    // category route define
    Route::match(['get','post'],'/admin/addCategory', 'CategoryController@addCategory');
    Route::match(['get','post'],'/admin/editCategory/{id}', 'CategoryController@editCategory');
    Route::match(['get','post'],'/admin/deleteCategory/{id}', 'CategoryController@deleteCategory');
    Route::get('/admin/viewCategory','CategoryController@viewCategory');

    // Product route define
    Route::match(['get','post'],'/admin/addProduct', 'ProductController@addProduct');
    Route::match(['get','post'],'/admin/editProduct/{id}', 'ProductController@editProduct');
    Route::get('/admin/deleteProduct/{id}','ProductController@deleteProduct');
	Route::get('/admin/deleteProductImage/{id}','ProductController@deleteProductImage');
    Route::get('/admin/viewProduct','ProductController@viewProduct');

    //product Attributes
	Route::match(['get','post'],'/admin/addAttribute/{id}','ProductController@addAttribute');
	Route::get('/admin/deleteAttribute/{id}','ProductController@deleteAttribute');

});
Route::get('/logout','AdminController@logout');

