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
Route::post('/insert','HomeController@insert')->name('insert');
Route::get('/delete/{id}','HomeController@delete')->name('delete');
Route::get('/done/{id}','HomeController@done')->name('done');
Route::get('/edit/{id}','HomeController@edit')->name('edit');
Route::post('/update/{id}','HomeController@update')->name('update');
Route::get('/restore/{id}','HomeController@restore')->name('restore');
Route::get('/destroy/{id}','HomeController@destroy')->name('destroy');
