<?php

namespace App\Imports;

use App\Categoria;
use Maatwebsite\Excel\Concerns\ToModel;

class CategoriasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Categoria([
            'id' => $row[0],
            'nombre' => $row[1],
            'codigo' => $row[2],
            'descripcion' => $row[3],
            'visible' => $row[4],
        ]);
    }
}
