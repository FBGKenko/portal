<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use App\Models\Empresa;
use App\Models\Usuario;
use Illuminate\Http\Request;

class registrarController extends Controller
{
    public function index()
    {
        return view('registrar');
    }

    public function registrar(Request $r)
    {
        if(Usuario::where('correo', $r->txtCorreo)->first() != NULL){
            return "El correo ya se encuentra registrado";
        }
        else if(Usuario::where('correo', $r->txtCorreo)->first() != NULL){
            return "El telefono ya se encuentra registrado";
        }

        if($r->sTipo == "Dueño" && Empresa::where('razonSocial', $r->txtRazonSocial)->first() != NULL){
            return "La razon social ya se encuentra registrada";
        }
    

        $usuario = new Usuario();
        $usuario->correo = $r->txtCorreo;
        $usuario->telefono = $r->txtTelefono;
        $usuario->clave = password_hash($r->txtClave, PASSWORD_DEFAULT);
        $usuario->nombres = $r->txtNombres;
        $usuario->apellidos = $r->txtApellidos;
        $usuario->cumpleanios = $r->cumpleanios;
        $usuario->origen = "Portal";
        if($r->sTipo == "Dueño"){
            $usuario->tipo = "Dueño";
            $usuario->save();
            $empresa = new Empresa();
            $empresa->razonSocial = $r->txtRazonSocial;
            $empresa->correoEmpresa = $r->txtCorreoEmpresa;
            $empresa->telefonoEmpresa = $r->txtTelefonoEmpresa;
            $empresa->paginaWeb = $r->txtPaginaWeb;
            $empresa->usuario_id = Usuario::where('correo', $r->txtCorreo)->first()->id;
            $empresa->save();
        }
        else if($r->sTipo == "Cliente"){
            $usuario->tipo = "Cliente";
            $usuario->save();
        }
        $conf = new Configuracion();
        $conf->usuario_id = Usuario::where('correo', $r->txtCorreo)->first()->id;
        $conf->modoOscuro = 'N';
        $conf->datosPrivados = 'N';
        $conf->save();
        return 0;
    }
}
