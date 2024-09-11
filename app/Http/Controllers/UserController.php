<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\TryCatch;

class UserController extends Controller
{
    public function formularioLogin(){
        if(Auth::check()){
            return redirect()->route('backoffice.dashboard');
        }
        return view('usuario.login');
    }

    public function formularioNuevo(){
        if(Auth::check()){
            return redirect()->route('backoffice.dashboard');
        }
        return view('usuario.create');
    }

    public function login(Request $_request){
        $mensajes = [
            'email.required' => 'El email es obligatorio',
            'email.email' => 'El email no tiene un formato válido',
            'password.required' => 'La contraseña es obligatoria'
        ];

        $_request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], $mensajes);

    }

    public function registrar(Request $_request){
        $mensajes =[
            'nombre.required' => 'El nombre es obligatorio.',
            'email.required' => 'El email es obligatorio.',
            'email.email' => 'El email no tiene un formato válido.',
            'password.required' => 'La contraseña es obligatoria.',
            'rePassword.required' => 'Repetir contraseña es obligatoria',
            'dayCode.required' => 'El código del día es obligatoria',
        ];

        $_request -> validate([
            'nombre' => 'required|string|max:50',
            'email' => 'required|email|max:100',
            'password' => 'required',
            'rePassword' => 'required',
            'dayCode' => 'required',
        ], $mensajes);

        $datos = $_request->only('nombre','email','password','rePassword','dayCode');

        //Mensaje de error en caso que la contraseña no coincida en los dos campos - password y rePassword
        if($datos['password'] != $datos['rePassword']){
            return back()->withErrors(['message' => 'Las contraseñas ingresadas no son iguales.']);
        }

        //COMPROBAR EL CÓDIGO DEL DÍA
        //Definir el código del día
        date_default_timezone_set('America/Santiago');
        //Validar el código del día
        if($datos['dayCode'] != date("d")){
            return back()->withErrors(['message'=> 'El código del día es inválido']);
        }

        try {
            User::create([
                'nombre' => $datos['nombre'],
                'email' => $datos['email'],
                'password' => Hash::make($datos['password']),
            ]);
            return redirect()->route('usuario.login')->with('success', 'Usuario creado exitosamente.');
        }catch (Exception $e){
            return back()->withErrors(['message'=> 'Error: ' . $e->getMessage()]);
        }
    }
}
