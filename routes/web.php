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

Route::get('/', 'WorkerController@index');
Auth::routes();

Route::group(['prefix' => 'home'], function() {
    Route::get('/', 'HomeController@index');
    Route::match(['get', 'post'], 'create', 'HomeController@create');
    Route::match(['get', 'put'], 'update/{id}', 'HomeController@update');
    Route::get('show/{id}', 'HomeController@show');
    Route::delete('delete/{id}', 'HomeController@destroy');
});

Route::get('/search', 'WorkerController@search');
Route::get('/{workers}', 'WorkerController@show')->name('show');
