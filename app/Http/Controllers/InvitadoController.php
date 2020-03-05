<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Producto;

class InvitadoController extends Controller
{
    /**
     * Mostrar una lista del recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categorias = Categoria::all();

        session(['categorias' => $categorias]);

        //$categorias->toArray();
        // $productos = Producto::where('destacado','=', 1)->get();

        $productos_destacados = Producto::where('destacado', '=', 1)
            ->orWhere('fecha_inicial', '<', date('Y-m-d'))
            ->orWhere('fecha_final', '>', date('Y-m-d'))
            ->orWhere('fecha_final', '>', 'fecha_inicial')
            ->paginate(3); //->get()-toArray(); Para mostrar el nombre de la categoría

            return view('index', ['destacados' => $productos_destacados]);

            /* 
            Mostrar el nombre de la categoría en los artículos destacados,
            $i = -1;
            foreach ($productos_destacados  as $producto) {
            $i++;
            $categoria_producto = Categoria::where('id', $producto['categoria_id'])->first();
            $productos_destacados[$i]['nombre_categoria'] = $categoria_producto->nombre;
            }
            */    
    }


    /**
     * mostrarProductos Función que nos muestra los productos de la base de datos
     *
     * @param  mixed $nombre_categoria
     *
     * @return
     */
    public function mostrarProductos($nombre_categoria)
    {

        if ($nombre_categoria != 'productos') {

            $categoria_seleccionada = Categoria::where('nombre', $nombre_categoria)->first();

            $productos_categoria = Producto::where('categoria_id', $categoria_seleccionada['id'])->paginate(3); //Mostramos 3 productos con su paginación cuando seleccionamos una categoría

            return view('productos', ['productos' => $productos_categoria]);

        } else {

            $productos = Producto::select('*')->paginate(6); //Mostramos 6 productos con la paginación
            return view('productos', ['productos' => $productos]);

        }
    }

    /**
     * mostrarCategoria Función con la que mostrarmos las categorías de los productos
     *
     * @return 
     */
    public function mostrarCategoria()
    {
        $categorias = Categoria::select('*');
        return view('categorias', ['categorias' => $categorias]);

    }

    /**
     * productoSeleccionado Función con la que mostramos el producto que hemos seleccionado según el id
     *
     * @param  mixed $id
     *
     * @return 
     */
    public function productoSeleccionado($id)
    {

        $producto_seleccionado = Producto::where('id', $id)->first()->toArray();
        return view('producto_seleccionado', ['producto_seleccionado' => $producto_seleccionado]);

    }


}
