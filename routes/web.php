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

Route::resource('user', 'UserController');
Route::resource('permisos', 'UserController');
Route::get('/', 'UserController@create');
Route::resource('empresa','EmpresaController');

Route::resource('graph', 'GraphController');
Route::post('graph/json', 'GraphController@jsonResponse');
Route::post('personaAdd/json', 'PersonaController@jsonAdd');
Route::post('personaEdit/json', 'PersonaController@jsonEdit');
Route::post('personaPass/json', 'PersonaController@jsonChangePass');

Route::post('personaDelete/json', 'PersonaController@jsonDelete');
Route::post('cargoAdd/json', 'PersonaController@jsonAddCargo');
Route::post('cargoEdit/json', 'PersonaController@jsonEditCargo');
Route::post('cargoDelete/json', 'PersonaController@jsonDeleteCargo');

//Route::post('userAdd/json', 'UserController@jsonAddUser');
Route::post('userAdd/json', 'UserController@store');
Route::post('userDel/json', 'UserController@destroy');
//Route::post('userDel/json', 'UserController@destroy');

Route::resource('persona','PersonaController');
Auth::routes();
Route::resource('otros', 'OtroAreaController');



