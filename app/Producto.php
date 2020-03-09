<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;



class Producto extends Model
{
    use Notifiable;
    //Laravel por defecto espera las columnas created_at y updated_at. 
    //Para que los campos no estén por defecto añadimos public $timestamps = false; en el modelo.

    public $timestamps = false; //Desactivamos el uso de $timestamps

    
    protected $table = 'producto';


    protected $fillable = [
        'id', 'nombre', 'codigo', 'precio_venta', 'imagen', 'iva', 'descripcion', 'destacado', 'fecha_inicial', 'fecha_final', 'stock', 'visible', 'categoria_id',
    ];
}
