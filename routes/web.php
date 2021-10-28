<?php

use Illuminate\Support\Facades\Route;

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

Route::post('validar','AccesoController@validar');

Route::apiResource('apiMascota','MascotaController');
Route::apiResource('apiEspecie','EspecieController');
Route::apiResource('apiPropietario','PropietarioController');

Route::view('mascotas','mascotas');