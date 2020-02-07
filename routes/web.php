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

// Route::get('/', function () {
//     return view('index');
// });


Route::get('/', 'IndexController@index')->middleware(['panel','messages','pago']);


Route::get('adminPanel', 'IndexController@adminpanel')->middleware(['admin','messages']);


//ASISTENTE

Route::get('pago', 'PagoCongresoController@create')->middleware(['asistente','verified']);
Route::post('pago', 'PagoCongresoController@store')->middleware(['asistente','verified']);


// PANEL ADMIN

Route::get('aceptar', 'PagoCongresoController@showPanel')->middleware(['admin','messages']);

Route::get('panelCreatePonencia', 'PonenciaController@create')->middleware('admin');
Route::post('panelCreatePonencia', 'PonenciaController@store')->middleware('admin');

Route::get('panelCreateComite', 'UserController@create')->middleware('admin');
Route::post('panelCreateComite', 'UserController@store')->middleware('admin');

Route::get('deleteUser', 'UserController@allUser')->middleware('admin');
Route::post('deleteUser', 'UserController@destroy')->middleware('admin');



// COMPROBANTE ADMIN

Route::get('pago/{iduser}', 'PagoCongresoController@imageid')->middleware('admin');

Route::put('aceptarpago', 'PagoCongresoController@update')->middleware('admin');

Route::post('borrarpago', 'PagoCongresoController@destroy')->middleware('admin');



// COMITE

Route::get('createPonente', 'UserController@index')->middleware(['comite','verified']);

Route::post('createPonente', 'UserController@storePonente')->middleware(['comite','verified']);


// PONENTE

Route::get('createPonencia', 'PonenciaController@createPo')->middleware(['ponente','verified']);
Route::post('createPonencia', 'PonenciaController@storePo')->middleware(['ponente','verified']);

// PONENCIAS

Route::get('ponencias', 'PonenciaController@index')->middleware(['messages']);

Route::get('showPonencia/{id}', 'PonenciaController@show')->middleware(['messages','asistente','comprobarpago']);

Route::get('certificado/{id}', 'PonenciaController@certificado')->middleware(['messages','asistente','comprobarpago']);


// USER 
Route::get('profile/{id}', 'UserController@show')->middleware('clearCache');

Route::post('uploadIMG','UserController@subirProfile')->middleware('clearCache');

Route::get('img/{iduser}', 'UserController@imageid')->middleware('clearCache');






Auth::routes(['verify'=>true]);