<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'TasksController@list');
Route::post('search', 'TasksController@search');

/*Auth*/
Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', 'AuthController@logout');
    Route::get('/tasks', 'TasksController@list')->name('tasks.list');
    Route::get('/show/{id}', 'TasksController@show')->name('task.show');
    Route::get('/create', 'TasksController@create');
    Route::post('/create', 'TasksController@store');
    Route::get('/edit/{id}', 'TasksController@edit')->name('task.edit');
    Route::post('/edit/{id}', 'TasksController@update');
    Route::get('/delete/{id}', 'TasksController@destroy')->name('task.delete');
    Route::get('/status', 'TasksController@status');
});

/*Guest*/
Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', 'AuthController@registerForm');
    Route::post('/register', 'AuthController@register');
    Route::get('/login', 'AuthController@loginForm')->name('login');
    Route::post('/login', 'AuthController@login');
});
