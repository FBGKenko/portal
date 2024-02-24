<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use App\Models\Empresa;
use App\Models\Usuario;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class registrarController extends Controller
{
    public function index()
    {
        return view('vistaLogin.registrar');
    }

    public function registrar(Request $r)
    {
        if(Usuario::where('correo', $r->txtCorreo)->first() != NULL){
            return [0, "El correo ya se encuentra registrado"];
        }
        else if(Usuario::where('telefono', $r->txtTelefono)->first() != NULL){
            return [0, "El telefono ya se encuentra registrado"];
        }

        try{
            DB::beginTransaction();
            $usuario = new Usuario();
            $usuario->correo = $r->txtCorreo;
            $usuario->telefono = $r->txtTelefono;
            $usuario->clave = password_hash($r->txtClave, PASSWORD_DEFAULT);
            $usuario->nombres = $r->txtNombres;
            $usuario->apellidos = $r->txtApellidos;
            if(isset($r->cumpleanios)){
                $usuario->cumpleanios = $r->cumpleanios;
            }
            $usuario->origen = "Portal";
            $usuario->save();
            DB::commit();
            return [1, 'Exito'];
        }
        catch(Exception $e){
            DB::rollBack();
            return [0, 'Ocurrió un error de servidor.'];
        }
        return [0, 'Ocurrió un error de servidor.'];
    }
}
