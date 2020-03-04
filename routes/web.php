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


Route::get('/', "InvitadoController@index");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/contacto', function() {
    return view('/contacto');
});


Route::get('/proceder_compra', function() {
    return view('/proceder_compra');
});



Route::get('/cerrar_sesion', function() {
    Auth::logout();
    return redirect('/');
});


Route::get('/categorias', "InvitadoController@mostrarCategoria");


Route::get('/categoria/{nombre_categoria}', "InvitadoController@mostrarProductos");

// CARRITO --------------------

Route::get('/carrito', function() {
    return view('/carrito');
});

Route::get('/comprando', "PedidoController@addPedido");

Route::get('/compra_confirmada', function() {
    return view('/cliente/compra_confirmada');
});

Route::get('/mis_pedidos', "PedidoController@miPedido");



Route::get('/descarga_pdf/{id}', "PedidoController@downloadPdf"); /* REVISAR DESCARGA DE PDF */


Route::get('/anular_pedido/{id}', function($id) {
    return view('/cliente/anular_pedido', ['id' => $id]);
});

Route::get('/pedido_anulado/{id}', "PedidoController@anularPedido");


Route::any('/add_carrito/{id}/{cantidad}', "CartController@add");

//Route::post('/update_carrito', "CartController@update");

Route::get('/delete_carrito/{id}', "CartController@delete");

//-------------------------------


Route::get('/datos_usuario', function() {
    return view('/cliente/datos_usuario');
});

Route::get('/perfil', function() {
    return view('/cliente/perfil');
});

Route::post('/cliente/modificar_datos', "ClienteController@update");

Route::get('/baja_confirmada', "ClienteController@bajaUsuario");

Route::get('/confirmacion_baja', function() {
    return view('/cliente/confirmacion_baja');
});


Route::get('/{nombre_categoria}', "InvitadoController@mostrarProductos");

Route::get('/producto/{id}', "InvitadoController@productoSeleccionado");



