<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;

use Illuminate\Http\Request;
use App\Producto;
use Cart;

class CartController extends Controller
{
    
    public function add($id, $cantidad, Request $request){

        $producto = Producto::where('id', $id)->first();
        
       if ($request->has('cantidad')) {

        $cantidad = $request->cantidad;

       } 

        $stock = $producto->stock;
        $cantidad_carrito = Cart::get($id);
        
        if ($cantidad_carrito['quantity'] + $cantidad <= $stock){
            
            Cart::add($producto->id, $producto->nombre, $producto->precio_venta, $cantidad, array('imagen'=> $producto->imagen));

            return back();

        }else{

            return redirect('/carrito')->with('error', 0);
        }

    }

    /* 
        array format
        Cart::add(array(
            'id' => 456, // inique row ID
            'name' => 'Sample Item',
            'price' => 67.99,
            'quantity' => 4,
            'attributes' => array()
        ));
    */


    public function delete($id){

        Cart::remove($id);
        return back();
    }
    
    public function vaciarCarrito(){

        Cart::clear();
        return back();
    }
}
