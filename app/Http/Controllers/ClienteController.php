<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;

class ClienteController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       
        $validate = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'nombre' => ['required', 'string'],
            'apellidos' => ['required', 'string'],
            'dni' => ['required', 'string','min:9', 'max:9'],
            'direccion' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8'],
            ]);

            User::where('id',Auth::id())->update(['email'=>$validate['email'],
            'nombre'=>$validate['nombre'],
            'apellidos'=>$validate['apellidos'],
            'dni'=>$validate['dni'],
            'direccion'=>$validate['direccion'],
            'password'=>$validate['password'],
            ]);    

        return redirect('/perfil')->with('success', 0);
    
    }


    /**
     * Baja del usuario.
     *
     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response
     */
    public function bajaUsuario(Request $request)
    {
        User::where('id',Auth::id())->update(['baja'=>1]);

        Auth::logout();
        
        return redirect('/');
    
    }
}
