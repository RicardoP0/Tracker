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

Route::get('/registro', function () {
    return view('Registro/registro');
});

Route::get('/config', function () {
    return view('Registro/config');
});

Route::get('/datos', function () {
    return view('Registro/datos');
});

Route::get('/datost', function () {
    return view('Registro/datost');
});

Auth::routes();
Route::get('/home1', function () {
    return view('home');
});
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('graph', 'GraphController');
Route::resource('persona','PersonaController');