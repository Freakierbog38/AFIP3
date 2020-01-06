<?php

namespace App\Http\Controllers;

use App\User;
use App\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class UsuariosController extends Controller
{

    // Se usa esta clase para utilizar los métodos de autenticación
    use AuthenticatesUsers;

    // Ruta a la que redirije después de autenticar
    protected $redirectTo = '/';

    // Se sobreescribe para hacer referencia al campo en la tabla, en este caso, 'usuarios' que contendrá el nombre de usuario o correo para la autenticación
    public function username()
    {
        return 'correo';
    }

    // función que es la que muestra la vista del login
    public function showLoginForm()
    {
        return view('/login');
    }

    // Función cread para mostrar la vista de registro de usuario
    public function registroForm()
    {
        return view('registro');
    }

    // Función creada para registrar un usuario nuevo
    public function registro(Request $request)
    {

        $empresa_nueva = new Empresa;
        
        $empresa_nueva->nombre = $request['nombre_empresa'];
        $empresa_nueva->rfc = $request['rfc'];
        $empresa_nueva->telefono = $request['telefono'];
        $empresa_nueva->direccion = $request['direccion'];
        $empresa_nueva->giro = $request['giro'];

        $empresa_nueva->save();

        $usuario_nuevo = new User;
        
        $usuario_nuevo->nombre = $request['nombre'];
        $usuario_nuevo->apellido_paterno = $request['apellido_paterno'];
        $usuario_nuevo->apellido_materno = $request['apellido_materno'];
        $usuario_nuevo->correo = $request['correo'];
        $usuario_nuevo->password = bcrypt($request['password']);
        $usuario_nuevo->id_empresa = $empresa_nueva->id;

        $usuario_nuevo->save();

        return redirect('login');
    }

    // Función para cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }

}
