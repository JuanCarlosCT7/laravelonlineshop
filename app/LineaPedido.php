<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class LineaPedido extends Model
{
     //Laravel por defecto espera las columnas created_at y updated_at. 
    //Para que los campos no estén por defecto añadimos public $timestamps = false; en el modelo.

    public $timestamps = false; //Desactivamos el uso de $timestamps

    protected $table = 'linea_pedido';

    protected $fillable = [
        'cantidad', 'precio', 'producto_id', 'pedido_id',
    ];

}
