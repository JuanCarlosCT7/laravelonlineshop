<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mapper;

class MapController extends Controller
{
    public function mapa()
    {
        Mapper::map(37.264720, -6.926970,['zoom' => 15]);

        return view('/contacto');
    }
}
