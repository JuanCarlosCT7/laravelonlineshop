<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use Cart;

class CartController extends Controller
{
    
    public function add($id){

        $producto = Producto::where('id', $id)->first();

        Cart::add($producto->id, $producto->nombre, $producto->precio_venta, 1, array('imagen'=> $producto->imagen));

        return back();


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
}
