<?php

namespace App\Http\Controllers;

use App\Usuario;
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

    // Muestra el llenado para registro de empresa
    public function formEmpresa()
    {
        return view('/registroEmpresa', ['title' => 'Registro de Empresa']);
    }

    // Función cread para mostrar la vista de registro de usuario
    public function registroForm()
    {
        return view('registro');
    }

    public function registroEmpresa(Request $request){
        // Sirve para validar que los campos estén llenados, o verificar alguna otra validación
        $rules = array(
            'nombreEmpresa' => 'required',
            'rfc' => 'required',
            'repLegalNombre' => 'required',
            'repLegalAPaterno' => 'required',
            'repLegalAMaterno' => 'required',
            'nivelEstudio' => 'required',
            'sexo' => 'required',
            'camaraEmpresarial' => 'required',
            'giro' => 'required',
            'calleNumero' => 'required',
            'colonia' => 'required',
            'cp' => 'required',
            'municipio' => 'required',
            'correoEmpresa' => 'required',
            'NumEmpleados' => 'required',
            'aniosExportacion' => 'required',
            'certificacionCalidad' => 'required',
            'EmpresaOperacion' => 'required',
            'actividad' => 'required',
            'scian' => 'required',
            'operacionInicio' => 'required',
            'numSucursales' => 'required',
            'estadosFinan' => 'required',
        );

        // Se validan
        $error = \Validator::make($request->all(), $rules);

        // Si hay errores
        if($error->fails())
        {
            // Regresa el array de los errores en formato Json
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // Si no hubo errores se ejecuta el procedimiento almacenado
        \DB::select('CALL add_empresa(?,?,?,?, ?,?,?,?, ?,?,?,?, ?,?,?,?, ?,?,?,?, ?,?,?,?, ?,?,?)', array(
            $request->nombreEmpresa,
            $request->rfc,
            $request->camaraEmpresarial,
            $request->telefono,
            $request->fax,
            $request->correoEmpresa,
            $request->NumEmpleados,
            $request->sector,
            $request->giro,
            $request->aniosExportacion,
            $request->certificacionCalidad,
            $request->actividad,
            $request->EmpresaOperacion,
            $request->scian,
            $request->operacionInicio,
            $request->numSucursales,
            $request->estadosFinan,
            $request->repLegalNombre,
            $request->repLegalAPaterno,
            $request->repLegalAMaterno,
            $request->nivelEstudio,
            $request->sexo,
            $request->calleNumero,
            $request->colonia,
            $request->cp,
            $request->municipio,

            \Auth::user()->id_usuario
        ));

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!', 'datos' => $request->all()]);
    }

    // Función creada para registrar un usuario nuevo
    public function registro(Request $request)
    {
        $usuario_nuevo = new Usuario;
        
        $usuario_nuevo->correo = $request['correo'];
        $usuario_nuevo->password = bcrypt($request['password']);
        $usuario_nuevo->id_rol = $request['id_rol'];
        $usuario_nuevo->estado = $request['estado'];

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
