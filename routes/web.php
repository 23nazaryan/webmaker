<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');

/*Auth*/
Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', 'AuthController@logout');
});

/*Developer*/
Route::group(['middleware' => 'developer'], function () {

});

/*Manager*/
Route::group(['middleware' => 'manager'], function () {

});

/*Guest*/
Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', 'AuthController@registerForm');
    Route::post('/register', 'AuthController@register');
    Route::get('/login', 'AuthController@loginForm')->name('login');
    Route::post('/login', 'AuthController@login');
});
