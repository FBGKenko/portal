<?php

namespace App\Http\Controllers;

use App\Models\Token;
use App\Models\Usuario;
use Illuminate\Http\Request;

class cambiarContraseñaController extends Controller
{
    public function index($tokenC)
    {
        $token = Token::where('token', $tokenC)->first();
        $usuario = $token->usuario;
        return view('vistaLogin.cambiarContraseña', compact('token', 'usuario'));
    }

    public function cambiarContra(Request $r, $token)
    {
        //buscar usuario, cifrar contraseña, actualizar contra
        $tokenE = Token::where('token', $token)->first();
        $usuario = Usuario::find($tokenE->usuario->id);
        $usuario->clave = password_hash($r->txtContra1, PASSWORD_DEFAULT);
        $usuario->save();

        $tokenE->delete();

        return $r->all();
    }
}
