<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1'], function(){
		Route::post('/auth/login', 'Auth\TokensController@login');
		Route::get('/auth/logout', 'Auth\TokensController@logout');
		Route::group(['middleware' => ['jwt.auth']], function(){
			Route::post('/auth/refresch', 'Auth\TokensController@refreshToken');
			Route::get('/auth/expire', 'Auth\TokensController@expireToken');
			Route::get('/users', 'UserController@index')->name('users.index');	
			Route::get('/users/create', 'UserController@create')->name('users.create');		
			Route::post('/users/store', 'UserController@store')->name('users.store');		
			Route::get('/users/edit/{id}', 'UserController@edit')->name('users.edit');	
			Route::put('/users/update/{id}', 'UserController@update')->name('users.update');	
			Route::post('/users/delete', 'UserController@destroy')->name('users.delete');	
			Route::get('/customers', 'CustomerController@index')->name('customers.index');	
			Route::get('/customers/create', 'CustomerController@create')->name('customers.create');	
			Route::get('/customers/edit/{id}', 'CustomerController@edit')->name('customers.edit');
			Route::post('/customers/delete', 'CustomerController@destroy')->name('customers.delete');	
	});

});


