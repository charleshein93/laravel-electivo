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

Route::get('/', function(){
   return view('welcome');
});

Route::prefix('boletas')->name('boletas.')->group(function(){
    Route::get('/', 'BoletaController@index')->name('index');
    Route::get('/nuevo', 'BoletaController@nuevo')->name('crear');
    Route::post('/nuevo', 'BoletaController@guardar')->name('guardar');
    Route::get('/{boleta}/modificar', 'BoletaController@modificar')->name('modificar');
    Route::put('/{boleta}/modificar', 'BoletaController@actualizar');
    Route::delete('/{boleta}/eliminar', 'BoletaController@eliminar')->name('eliminar');
});


// Route::prefix('productos')->name('productos.')->group(function(){
//     Route::get('/', 'ProductoController@index')->name('index');
//     Route::get('/nuevo', 'ProductoController@nuevo')->name('crear');
//     Route::post('/nuevo', 'ProductoController@guardar')->name('guardar');
//     Route::get('/{producto}/modificar', 'ProductoController@modificar')->name('modificar');
//     Route::put('/{producto}/modificar', 'ProductoController@actualizar');
//     Route::delete('/{producto}/eliminar', 'ProductoController@eliminar')->name('eliminar');
// });

// Route::prefix('facturas')->name('facturas.')->group(function(){
//     Route::get('/', 'FacturaController@index')->name('index');
//     Route::get('/nuevo', 'FacturaController@nuevo')->name('crear');
//     Route::post('/nuevo', 'FacturaController@guardar')->name('guardar');
//     Route::get('/{factura}/modificar', 'FacturaController@modificar')->name('modificar');
//     Route::put('/{factura}/modificar', 'FacturaController@actualizar');
//     Route::delete('/{factura}/eliminar', 'FacturaController@eliminar')->name('eliminar');
// });
