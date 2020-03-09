<?php

namespace App\Exports;

use App\Producto;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductosExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array // Encabezados 
    {
        return [
            'id',
            'nombre',
            'codigo',
            'precio_venta',
            'imagen',
            'iva',
            'descripcion',
            'destacado',
            'fecha_inicial',
            'fecha_final',
            'stock',
            'visible',
            'categoria_id',
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Producto::all();
    }
}
