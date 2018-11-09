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




Route::get('/datost', function () {
    return view('Registro/datost');
});

Auth::routes();
Route::get('/home1', function () {
    return view('home');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('datos', 'UniversidadController@index');
Route::get('datost', 'DatosController@index');
Route::get('config', 'DatosController@indexPost');

Route::resource('graph', 'GraphController');
Route::resource('persona','PersonaController');