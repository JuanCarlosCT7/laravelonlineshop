<?php

namespace App\Http\Controllers;

use Vyuldashev\XmlToArray\XmlToArray;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;
use App\Categoria;
use App\Producto;
use Validator;


class importXMLController extends Controller
{
    public function importXMLcategorias(Request $request)
    {           
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:xml'
        ]);        

        if($validator->passes()){

       //$archivo=$request->file('file');
       $file = $request->file('file');
       $content = file_get_contents($file->path());

       //print_r($content);
       
       $result = XmlToArray::convert($content);
       //print_r($result);

       foreach($result as $categoria){ // Selecciono los elementos dentro de la etiqueta <categoria>
        foreach($categoria as $fila){ // Selecciono los elementos dentro de la etiqueta fila (<primera>,<segunda>,etc)

            Categoria::create([      // Recorro los elementos dentro de la etiqueta fila
                'id' => $fila['id'],
                'nombre' => $fila['nombre'],
                'codigo' => $fila['codigo'],
                'descripcion' => $fila['descripcion'],
                'visible' => $fila['visible'],
            ]);
        }
    }

        return redirect('/importarXMLcategorias')->with('importar', 0);
    }else{
        return redirect('/importarXMLcategorias')->with('errors', 0);
    
        }
       
    }


    public function importXMLproductos(Request $request)
    {           
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:xml'
        ]);        

        if($validator->passes()){

       //$archivo=$request->file('file');
       $file = $request->file('file');
       $content = file_get_contents($file->path());

       //print_r($content);
       
       $result = XmlToArray::convert($content);
       //print_r($result);

       foreach($result as $producto){ // Selecciono los elementos dentro de la etiqueta <producto>
        foreach($producto as $fila){ // Selecciono los elementos dentro de la etiqueta fila (<primera>,<segunda>,etc)

            Producto::create([
                'id' => $fila['id'],
                'nombre'=> $fila['nombre'],
                'codigo'=> $fila['codigo'],
                'precio_venta'=> $fila['precio_venta'],
                'imagen'=> $fila['imagen'],
                'iva'=> $fila['iva'],
                'descripcion'=> $fila['descripcion'],
                'destacado'=> $fila['destacado'],
                'fecha_inicial'=> $fila['fecha_inicial'],
                'fecha_final'=> $fila['fecha_final'],
                'stock'=> $fila['stock'],
                'visible'=> $fila['visible'],
                'categoria_id'=> $fila['categoria_id'],
            ]);
        }
    }

        return redirect('/importarXMLproductos')->with('importar', 0);
    }else{
        return redirect('/importarXMLproductos')->with('errors', 0);
    
        }
       
    }
}


