<?php

namespace App\Http\Controllers;

use App\Producto;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    /**
     * add (añadir) Función para añadir productos al carrito
     * Control al añadir producto Si el stock es inferior a la cantidad añadida
     * mostrarmos mensaje de error
     *
     * @param  mixed $id
     * @param  mixed $cantidad
     * @param  mixed $request
     *
     * @return
     */
    public function add($id, $cantidad, Request $request)
    {

        $producto = Producto::where('id', $id)->first();

        if ($request->has('cantidad')) {

            $cantidad = $request->cantidad;

        }

        $stock = $producto->stock;
        $cantidad_carrito = Cart::get($id);

        if ($cantidad_carrito['quantity'] + $cantidad <= $stock) {

            Cart::add($producto->id, $producto->nombre, $producto->precio_venta, $cantidad, array('imagen' => $producto->imagen));

            return back();

        } else {

            return redirect('/carrito')->with('error', 0);
        }

    }

    /**
     * delete(eliminar) Función que elimina un artículo en el carrito según el id
     *
     * @param  mixed $id
     *
     */
    public function delete($id)
    {

        Cart::remove($id);
        return back();
    }

    /**
     * vaciarCarrito Función que vacía el carrito por completo
     *
     * @return void
     */
    public function vaciarCarrito()
    {

        Cart::clear();
        return back();
    }
}
