<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/usuarios', 'UsuariosController@index');

Route::put('/usuarios/actualizar/{id}', 'UsuariosController@update');

Route::post('/usuarios/guardar', 'UsuariosController@store');

Route::delete('/usuarios/borrar/{id}', 'UsuariosController@destroy');

Route::get('/usuarios/buscar/{id}', 'UsuariosController@show');

Route::post('/usuarios/import', 'UsuariosController@import');