<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Producto;
use App\Categoria;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $categorias = Categoria::all(); 

        session(['categorias' => $categorias]);

        //$categorias->toArray();

       // $productos = Producto::where('destacado','=', 1)->get();

       
       $productos_destacados = Producto::where('destacado','=', 1)
                    ->orWhere('fecha_inicial', '<', date('Y-m-d'))
                    ->orWhere('fecha_final', '>', date('Y-m-d'))
                    ->orWhere('fecha_final', '>', 'fecha_inicial')
                    ->get()->toArray();

        $i = -1;

        foreach ($productos_destacados  as $producto) {

            $i++;

            $categoria_producto = Categoria::where('id', $producto['categoria_id'])->first();


            $productos_destacados[$i]['nombre_categoria'] = $categoria_producto->nombre;

        }

        // MIRAR LUEGO $categoria_drone = Categoria::seelct('nombre');



        return view('index', ['destacados' => $productos_destacados] );

        /*
        $productos = Producto::where([['destacado','=', 1],
                                      ['fecha_inicial', '<', date('Y-m-d')],
                                      ['fecha_final', '>', date('Y-m-d')],
                                      ['fecha_final', '>', 'fecha_inicial'],
                                    
        ])->get();
        */

    }

    /**
     * Mostrar los productos de la base de datos.
     *
     * @return \Illuminate\Http\Response
     */
    public function mostrarProductos($nombre_categoria)
    {

        if ($nombre_categoria != 'productos') {

            $categoria_seleccionada = Categoria::where('nombre', $nombre_categoria)->first();

            $productos_categoria = Producto::where('categoria_id', $categoria_seleccionada['id'])->paginate(3);

            return view('productos', ['productos' => $productos_categoria]);
        
        } else {

            $productos = Producto::select('*')->paginate(6);
            return view('productos', ['productos' => $productos]);

        }
    }

     /**
     * Mostrar los productos de la base de datos.
     *
     * @return \Illuminate\Http\Response
     */
    public function mostrarCategoria()
    {
        $categorias = Categoria::select('*');
        return view('categorias', ['categorias' => $categorias]);

    }

    /**
     * Mostrar los productos de la base de datos.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function productoSeleccionado($id)
    {

        $producto_seleccionado = Producto::where('id',$id)->first()->toArray();
        return view('producto_seleccionado', ['producto_seleccionado' => $producto_seleccionado]);

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
