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

Route::apiResources([
    'autores' => 'API\AutorController',
    'clasificaciones' => 'API\ClasificacionController',
    'biblioteca' => 'API\BibliotecaController'
]);

Route::match(['get', 'post'],'/filterLibros', 'API\BibliotecaController@filterLibros')->name('filterLibros');


//Route::post('prueba', 'API\AutorController@prueba')->name('prueba');