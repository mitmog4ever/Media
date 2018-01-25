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

/*Route::get('/', function () {
    return view('welcome');
});
*/
/*
Route::resource('users', 'UserController');
*/
Route::get('/users', 'UserController@index')->name('users.index');
Route::get('/users/details/{id}', 'UserController@details')->name('users.details');
Route::get('/users/add', 'UserController@add')->name('users.add');
Route::post('/users/insert', 'UserController@insert')->name('users.insert');
Route::get('/users/edit/{id}', 'UserController@edit')->name('users.edit');
Route::post('/users/update/{id}', 'UserController@update')->name('users.update');
Route::get('/users/delete/{id}', 'UserController@delete')->name('users.delete');
