<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Pedido extends Model
{
     //Laravel por defecto espera las columnas created_at y updated_at. 
    //Para que los campos no estén por defecto añadimos public $timestamps = false; en el modelo.

    public $timestamps = false; //Desactivamos el uso de $timestamps

    protected $table = 'pedido';

    protected $fillable = [
        'id','nombre', 'apellidos', 'email', 'direccion', 'fecha', 'dni', 'estado', 'usuario_id',
    ];
}
