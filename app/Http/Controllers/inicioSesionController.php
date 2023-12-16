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
                session(["usuario" => $usuario]);
                return route('main');
            }
            return 2;
        }
        return 1;
    }
}
