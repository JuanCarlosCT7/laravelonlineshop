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

Route::get('/contacto', 'MapController@mapa');

Route::get('/proceder_compra', function() {
    return view('/proceder_compra');
});

Route::get('/cerrar_sesion', function() {
    Auth::logout();
    return redirect('/');
});

Route::get('/categorias', "InvitadoController@mostrarCategoria");

Route::get('/categoria/{nombre_categoria}', "InvitadoController@mostrarProductos");

// XML -------------------------------------------------------------------------------

Route::get('/exportarXMLproductos', function(){
    $productos = App\Producto::all();
    return response()->xml(['producto' => $productos->toArray()]);
});

Route::get('/descargarXMLproductos', function(){
    header('Content-Type: application/xml; charset=utf-8');
    header('Content-Disposition: attachment; filename="productos.xml"');
    $productos = App\Producto::all();
    return response()->xml(['producto' => $productos->toArray()]);
});

Route::get('/exportarXMLcategorias', function(){
    $categorias = App\Categoria::all();
    return response()->xml(['categoria' => $categorias->toArray()]);
});

Route::get('/descargarXMLcategorias', function(){
    header('Content-Type: application/xml; charset=utf-8');
    header('Content-Disposition: attachment; filename="categorias.xml"');
    $categorias = App\Categoria::all();
    return response()->xml(['categoria' => $categorias->toArray()]);
});

Route::get('/importarXMLcategorias', function() {
    return view('/importarXMLcategorias');
});

Route::post('/importando_categorias', 'importXMLController@importXMLcategorias');

Route::get('/importarXMLproductos', function() {
    return view('/importarXMLproductos');
});

Route::post('/importando_productos', 'importXMLController@importXMLproductos');

// XML -------------------------------------------------------------------------------

// EXCEL -----------------------------------------------------------------------------

Route::get('/exportarEXCELcategorias', 'ExcelController@exportarExcelCategorias');
Route::get('/exportarEXCELproductos', 'ExcelController@exportarExcelProductos');
Route::get('/exportarEXCELpedidos', 'ExcelController@exportarExcelPedidos');

Route::get('/importarEXCELcategorias', function() {
    return view('/importarEXCELcategorias');
});
Route::post('/importando_categorias_EXCEL', 'ExcelController@importarExcelCategorias');


Route::get('/importarEXCELproductos', function() {
    return view('/importarEXCELproductos');
});
Route::post('/importando_productos_EXCEL', 'ExcelController@importarExcelProductos');

// EXCEL -----------------------------------------------------------------------------

// CARRITO ---------------------------------------------------------------------------

Route::get('/carrito', function() {
    return view('/carrito');
});

Route::get('/comprando', "PedidoController@addPedido");

Route::get('/compra_confirmada', function() {
    return view('/cliente/compra_confirmada');
});

Route::get('/mis_pedidos', "PedidoController@miPedido");


Route::get('/info_pedido/{id}', "PedidoController@informacionPedido");



Route::get('/descarga_pdf/{id}', "PedidoController@downloadPdf"); 


Route::get('/anular_pedido/{id}', function($id) {
    return view('/cliente/anular_pedido', ['id' => $id]);
});

Route::get('/pedido_anulado/{id}', "PedidoController@anularPedido");


Route::any('/add_carrito/{id}/{cantidad}', "CartController@add");



Route::get('/delete_carrito/{id}', "CartController@delete");

Route::get('/vaciar_carrito', "CartController@vaciarCarrito");

// CARRITO ---------------------------------------------------------------------------

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



