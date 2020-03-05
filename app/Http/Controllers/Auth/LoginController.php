<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | Este controlador maneja la autenticación de usuarios para la aplicación y 
    | los redirige a su pantalla de inicio. El controlador utiliza un trait(https://www.php.net/manual/es/language.oop5.traits.php) 
    | para proporcionar 
    | convenientemente su funcionalidad a sus aplicaciones.
    |
    */

    use AuthenticatesUsers;

    /**
     * Donde redirigir a los usuarios después de iniciar sesión.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Crea una nueva instancia de controlador.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    
    protected function credentials(Request $request)
    {
        $credentials = $request->only($this->username(), 'password');
        //Se tiene en cuenta el campo baja para el inicio de sesión del usuario
        $credentials['baja'] = 0;
        return $credentials;
    }

}
