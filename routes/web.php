<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function (){
    return redirect('index');
});
Route::get('login', 'Admin\LoginController@getLogin');
Route::post('login','Admin\LoginController@postLogin');
Route::get('layout', function (){
    return view('layout');
});
Route::get('index/detail/{id}','ShopController@getProductById');
Route::get('search/{id?}','ShopController@getProductByType');
Route::get('index','ShopController@index');
Route::get('contact',function (){
    return view('contact');
});
Route::get('test',function (){
    return view('test');
});
Route::get('key-search/{key?}','ShopController@getProductByName');
Route::get('index/detail/{id}','ShopController@getProductById');
Route::get('cart','ShopController@getCart');
Route::post('cart','ShopController@addProductToCart');
Route::post('cart/delete-product','ShopController@deleteItemCart');
Route::post('cart/save-cart','ShopController@saveCart');
Route::post('cart/delete-cart','ShopController@deleteCart');
Route::post('cart/save-bill','ShopController@saveBill');


Route::group(['prefix'=>'Admin','middleware'=>'loginadmin'], function(){
	Route::get('logout','Admin\LoginController@logout');
	Route::get('forbiden', function(){
		return view('Admin.forbiden');
	});

	Route::group(['prefix'=>'product', 'middleware'=>'role'], function(){
		Route::get('all-product','Admin\ProductController@getList');

		Route::get('add-product','Admin\ProductController@getAdd');
		Route::post('add-product','Admin\ProductController@postAdd');

		Route::get('edit-product/{id}','Admin\ProductController@getEdit');
        Route::post('edit-product','Admin\ProductController@postEdit');

		Route::get('delete-product/{id}','Admin\ProductController@getDelete');
        Route::post('delete-product/delete-image','Admin\ProductController@postDelImage');

	});

	
	Route::group(['prefix'=>'user','middleware'=>'user'], function(){
		Route::get('all-user', 'Admin\UserController@getAll');
		Route::get('edit/{username}',['use' => 'Admin\UserController@getEdit']);
		Route::post('edit/{username}',['use' => 'Admin\UserController@postEdit']);
		Route::get('add-user','Admin\UserController@getAdd');
		Route::post('add-user','Admin\UserController@postAdd');
		Route::get('get-permission/{id}',['uses' => 'Admin\UserController@getPermission']);\
		Route::get('delete-user/{id}','Admin\UserController@getDelete');
		Route::get('edit-user/{id}', 'Admin\UserController@getEdit');
		Route::post('edit-user', 'Admin\UserController@postEdit');

		Route::get('role-group','Admin\UserController@getRoleGroup');
		Route::post('role-group','Admin\UserController@postRoleGroup');
	});
});