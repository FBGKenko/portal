<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;


class inicioSesionController extends Controller
{
    public function index()
    {
        return view('vistaLogin.inicioSesion');
    }

    public function autentificar(Request $r)
    {
        $usuario = Usuario::where('telefono', $r->txtCorreo)->orwhere('correo',$r->txtCorreo)->first();
        if(isset($usuario)){
            if(password_verify($r->txtContra, $usuario->clave)){
                unset($usuario->clave);
                session(["usuario" => $usuario]);
                return redirect()->route('main');
            }
            return redirect()->back()->withInput()->withErrors(['error' => 'Contraseña incorrecta']);
        }
        return redirect()->back()->withInput()->withErrors(['error' => 'Usuario no encontrado']);
    }
}
