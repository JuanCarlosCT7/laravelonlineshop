<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class LineaPedido extends Model
{
    public $timestamps = false;

    protected $table = 'linea_pedido';

    protected $fillable = [
        'cantidad', 'precio', 'producto_id', 'pedido_id',
    ];

}
