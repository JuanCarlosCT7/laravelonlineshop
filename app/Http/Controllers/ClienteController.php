<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\LineaPedido;
use App\Pedido;
use App\Producto;
use App\User;
use Auth;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * update(Actualizar) Función que actualiza el recurso especificado en el almacenamiento,
     * en nuestro caso actualizar datos del usuario
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $validate = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'nombre' => ['required', 'string'],
            'apellidos' => ['required', 'string'],
            'dni' => ['required', 'string', 'min:9', 'max:9'],
            'direccion' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        User::where('id', Auth::id())->update([
            'email' => $validate['email'],
            'nombre' => $validate['nombre'],
            'apellidos' => $validate['apellidos'],
            'dni' => $validate['dni'],
            'direccion' => $validate['direccion'],
            'password' => $validate['password'],
        ]);

        return redirect('/perfil')->with('success', 0);

    }

    /**
     * bajaUsuario Funcion que da de baja a un usuario actualizado el campo
     * "baja" a 1, en el caso de que el usuario tenga pedidos realizados con estado
     * "Pendiente Procesamiento" serán Anulados y restablecemos el stock
     * de los productos anteriormente comprados.
     *
     * @param  \Illuminate\Http\Request  $request

     *
     */
    public function bajaUsuario(Request $request)
    {
        User::where("username", Auth::user()->username)->update(["baja" => 1]);
        $pedidos = Pedido::where("usuario_id", Auth::id())->get();

        foreach ($pedidos as $pedido) {

            if ($pedido->estado == "Pendiente Procesamiento") {

                $pedido->update(["estado" => "Anulado"]);
                $productos_pedido = LineaPedido::where("pedido_id", $pedido->id)->get();

                foreach ($productos_pedido as $producto) {

                    Producto::where("id", $producto->producto_id)->increment("stock", $producto->cantidad); //Método de laravel que actualiza la columna que hemos especificado
                }
            }
        }

        Auth::logout();

        return redirect('/');

    }

}
