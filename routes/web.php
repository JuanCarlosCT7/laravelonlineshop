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



Route::get('/restablecer_password', function() {
    return view('/restablecer_password');
});


Route::get('/proceder_compra', function() {
    return view('/proceder_compra');
});



Route::get('/cerrar_sesion', function() {
    Auth::logout();
    return redirect('/');
});


Route::get('/categorias', "ClienteController@mostrarCategoria");


Route::get('/categoria/{nombre_categoria}', "ClienteController@mostrarProductos");

// CARRITO --------------------

Route::get('/carrito', function() {
    return view('/carrito');
});

Route::get('/comprando', "PedidoController@addPedido");

Route::get('/compra_confirmada', function() {
    return view('/cliente/compra_confirmada');
});

Route::get('/mis_pedidos', "PedidoController@miPedido");


Route::get('/anular_pedido/{id}', function($id) {
    return view('/cliente/anular_pedido', ['id' => $id]);
});

Route::get('/pedido_anulado/{id}', "PedidoController@anularPedido");


Route::get('/add_carrito/{id}', "CartController@add");

Route::get('/delete_carrito/{id}', "CartController@delete");

//-------------------------------

Route::get('/{nombre_categoria}', "ClienteController@mostrarProductos");

Route::get('/producto/{id}', "ClienteController@productoSeleccionado");



