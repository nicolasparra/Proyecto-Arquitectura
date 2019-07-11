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
header('Access-Control-Allow-Origin: *');
Route::get('/', function () {
    return view('welcome');
});
//Total de estaciones meteorologicas
Route::get('/estaciones','estacionController@index');
//Estacion por ID
Route::get('/estaciones/{idEstacion}','estacionController@getEstacion');
//Tipos de estaciones 
Route::get('/estacionestipo','estacionController@getTipoEstacion');
//Parametros de estaciones
Route::get('/estacionesparametro','estacionController@getParametroEstacion');
//------------------------------------------------------------
Route::get('/estacionesnombretemperatura','estacionController@getNombreTemperatura');
Route::get('/estacionesnombrehumedad','estacionController@getNombreHumedad');
Route::get('/estacionestemperatura','estacionController@getEstacionesTemperatura');
Route::get('/estacioneshumedad','estacionController@getEstacionesHumedad');
//Tempreaturas de una estacion especifica y dentro de un rango de fecha
Route::get('/temperatura','estacionController@Temperatura');
//Humedad deuna estacion especifica y dentro de un rango de fecha
Route::get('/humedad','estacionController@Humedad');





