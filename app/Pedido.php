<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Pedido extends Model
{
    public $timestamps = false;

    protected $table = 'pedido';

    protected $fillable = [
        'nombre', 'apellidos', 'email', 'direccion', 'fecha', 'dni', 'estado', 'usuario_id',
    ];
}
