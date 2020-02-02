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



Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::resource('home', 'HomeController');
    Route::resource('estadisticas', 'EstadisticasController');
    Route::resource('venta', 'VentaController');
    Route::resource('ingresos', 'IngresosController');
    Route::resource('caja', 'CajaController');
    Route::resource('/', 'HomeController');
    Route::resource('modal', 'ArticuloController');
});
Route::group(['middleware' => ['auth','admin']], function () {
    Route::resource('host', 'MaquinaController');
    Route::resource('admin', 'AdminController');
});




