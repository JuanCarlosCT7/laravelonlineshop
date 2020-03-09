<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Categoria extends Model
{
    public $timestamps = false; //Desactivamos el uso de $timestamps
    
    protected $table = 'categoria';

    protected $fillable = [
        'id', 'nombre', 'codigo', 'descripcion', 'visible',
    ];
}
