<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Producto extends Model
{

    public $timestamps = false;

    
    protected $table = 'producto';
}
