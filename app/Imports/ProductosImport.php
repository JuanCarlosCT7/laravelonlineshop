<?php

namespace App\Imports;

use App\Producto;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Producto([
            'id' => $row[0],
            'nombre'=> $row[1],
            'codigo'=> $row[2],
            'precio_venta'=> $row[3],
            'imagen'=> $row[4],
            'iva'=> $row[5],
            'descripcion'=> $row[6],
            'destacado'=> $row[7],
            'fecha_inicial'=> $row[8],
            'fecha_final'=> $row[9],
            'stock'=> $row[10],
            'visible'=> $row[11],
            'categoria_id'=> $row[12],
            
        ]);
    }
}
