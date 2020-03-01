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

Route::get('/', "ClienteController@index");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/cerrar_sesion', function() {
    Auth::logout();
    return redirect('/');
});


Route::get('/categorias', "ClienteController@mostrarCategoria");


Route::get('/categoria/{nombre_categoria}', "ClienteController@mostrarProductos");



Route::get('/{nombre_categoria}', "ClienteController@mostrarProductos");

Route::get('/producto/{id}', "ClienteController@productoSeleccionado");



