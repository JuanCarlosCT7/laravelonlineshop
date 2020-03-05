<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | Este controlador maneja el registro de nuevos usuarios, así como su validación 
    | y creación. Por defecto, este controlador utiliza un trait(https://www.php.net/manual/es/language.oop5.traits.php)
    | para proporcionar esta funcionalidad sin requerir ningún código adicional.
    |
    */

    use RegistersUsers;

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
        $this->middleware('guest');
    }

    /**
     * Obtener un validador para una solicitud de registro entrante.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username_register' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password_register' => ['required', 'string', 'min:8', 'confirmed'],
            'nombre' => ['required', 'string'],
            'apellidos' => ['required', 'string'],
            'dni' => ['required', 'string','min:9', 'max:9'],
            'direccion' => ['required', 'string'],

        ]);
    }

    /**
     * Crear una nueva instancia de usuario después de un registro válido.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username_register'],
            'email' => $data['email'],
            'password' => Hash::make($data['password_register']),
            'nombre' => $data['nombre'],
            'apellidos' => $data['apellidos'],
            'dni' => $data['dni'],
            'direccion' => $data['direccion'],
        ]);
    }

}
