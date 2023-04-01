<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;


class inicioSesionController extends Controller
{
    public function index()
    {
        return view('inicioSesion');
    }

    public function autentificar(Request $r)
    {
        $usuario = Usuario::where('telefono', $r->txtCorreo)->orwhere('correo',$r->txtCorreo)->first();
    
        if(isset($usuario)){
            //Contraseña es la correcta
            if(password_verify($r->txtContra, $usuario->clave)){
                //Guardar session
                if(session()->missing('usuario'))
                    session(["usuario" => $usuario]);
                //Es dueño o cliente
                if($usuario->tipo == "Dueño"){
                    return route('seguidores');
                }
                return route('main');
            }
            return 2;
        }   
        return 1;
    }
}
