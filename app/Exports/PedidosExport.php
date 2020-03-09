<?php

namespace App\Exports;

use App\Pedido;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PedidosExport implements FromCollection, WithHeadings
{

    public function headings(): array // Encabezados 
    {
        return [
            'id',
            'nombre',
            'apellidos',
            'email',
            'direccion',
            'fecha',
            'dni',
            'estado',
            'usuario_id',
        ];
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Pedido::all();

    }

}
