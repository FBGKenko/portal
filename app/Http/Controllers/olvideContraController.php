<?php

namespace App\Http\Controllers;

use App\Mail\olvideContraseniaMailable;
use App\Models\Token;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class olvideContraController extends Controller
{
    public function index()
    {
        return view('olvideContra');
    }

    public function enviarCorreo(Request $r)
    {
        if($r->txtCorreo != ""){
            $usuario = Usuario::where('correo', $r->txtCorreo)->first();
            if(isset($usuario)){
                $tokenExistente = Token::where('usuario_id', $usuario->id)->first();
                if(!isset($tokenExistente)){
                    $tokenActual = Str::uuid();
                    $token = new Token();
                    $token->token = $tokenActual;
                    $token->usuario_id = $usuario->id;
                    //$token->save();
                    
                    $correo = new olvideContraseniaMailable($token);
                    Mail::to($r->txtCorreo)->send($correo);
                    return "Mensaje enviado";
                }
            }
        }
        return "Error";
    }
}
