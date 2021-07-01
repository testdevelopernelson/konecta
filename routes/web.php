<?php

//Rutas autenticación usuario
// Auth::routes();

/*
|--------------------------------------------------------------------------
| Rutas traducidas
|--------------------------------------------------------------------------
 */
Route::group(['prefix' => LL::setLocale()], function () {
    Route::get('/', 'Auth\LoginController@show_login')->name('admin.login');

    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
});

Route::group(['middleware' => 'jwt.auth'], function () {
   	Route::group(['middleware' => ['role:Administrador']], function () {
    // Route::resource('users', 'UserController');
    });

    Route::group(['middleware' => ['role:Administrador|Vendedor']], function () {
        Route::resource('customers', 'CustomerController');
    });
});