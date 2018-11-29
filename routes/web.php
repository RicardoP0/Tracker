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

Route::resource('user', 'UserController');
Route::resource('empresa','EmpresaController');



Auth::routes();
Route::get('/home1', function () {
    return view('home');
});
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('graph', 'GraphController');
Route::post('graph/json', 'GraphController@jsonResponse');

Route::resource('persona','PersonaController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
