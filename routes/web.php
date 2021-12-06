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
    return view('login');
}); 

//inicio rutas api
Route::apiResource('apiMascota','MascotaController');
Route::apiResource('apiEspecie','EspecieController');
Route::apiResource('apiPropietario','PropietarioController');
Route::apiResource('apiProducto','ProductoController');
//fin rutas api

Route::view('mascotas','mascotas');
Route::view('venta','ventas');

Route::get('prueba', function(){
    //return base64_encode('HOLA');
    return DB::select("SELECT * FROM usuarios");
});

Route::get('Desencriptar', function(){
    return base64_decode('SE9MQQ==');
});
Route::post('validar','AccesoController@validar');
Route::view('especies','especies');
Route::view('main','main');
Route::view('propietarios','propietarios');

// RUTA PARAMETRIZADAS
Route::get('getRazas/{id_especie}', [
    'as'=> 'getRazas',
    'uses'=> 'EspecieController@getRazas',
]);
