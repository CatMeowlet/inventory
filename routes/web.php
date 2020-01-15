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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::post('/add', 'HomeController@store')->name('user.add');
Route::get('home/list', 'HomeController@get_log')->name('user.log');
Route::get('home/list/inventory', 'HomeController@get_inventory')->name('user.inventory');
Route::get('view/{id}', 'HomeController@view')->name('user.view');
