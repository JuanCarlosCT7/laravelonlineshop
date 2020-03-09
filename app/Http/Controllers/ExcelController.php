<?php

namespace App\Http\Controllers;

use App\Exports\CategoriasExport;
use App\Exports\ProductosExport;
use App\Exports\PedidosExport;

use App\Imports\CategoriasImport;
use App\Imports\ProductosImport;
use App\Imports\PedidosImport;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

use App\Producto;
use App\Categoria;

use Validator;

class ExcelController extends Controller
{
    /* EXPORTACIÓN */
    public function exportarExcelCategorias()
    {
        return Excel::download(new CategoriasExport, 'categorias.xlsx');
    }

    public function exportarExcelProductos()
    {
        return Excel::download(new ProductosExport, 'productos.xlsx');
    }

    public function exportarExcelPedidos()
    {
        return Excel::download(new PedidosExport, 'pedidos.xlsx');
    }
    /* EXPORTACIÓN */

    /* IMPORTACIÓN */
    public function importarExcelCategorias(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);        

        if($validator->passes()){

            $file = $request->file('file');
            Excel::import(new CategoriasImport, $file);
            
            return redirect('/importarEXCELcategorias')->with('importar', 0);
        }else{
            return redirect('/importarEXCELcategorias')->with('error', 0);
        
        }

    }

    public function importarExcelProductos(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);        

        if($validator->passes()){

        $file = $request->file('file');
        Excel::import(new ProductosImport, $file);

        return redirect('/importarEXCELproductos')->with('importar', 0);
    }else{
        return redirect('/importarEXCELproductos')->with('error', 0);
    
         }
    }
    /* IMPORTACIÓN */
}
