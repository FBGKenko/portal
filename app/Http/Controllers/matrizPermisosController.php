<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Permiso;
use App\Models\Usuario;
use Illuminate\Http\Request;

class matrizPermisosController extends Controller
{
    public function index()
    {
        $usuario = Usuario::find(session('usuario')->id);
        $empresasSiguiendo = $usuario->empresas;
        return view('vistaSesion.configuracion.matrizPermisosDatos', compact('empresasSiguiendo'));
    }
    public function cambiarPermiso(Request $r)
    {
        return 1;
        $cambiar = false;
        if($r->empresaSelect > 0){
            $empresa = Empresa::find($r->empresaSelect);
            foreach ($empresa->usuarios as $usuario) {
                if($usuario->pivot->usuario_id == session('usuario')->id){
                    $permisos = $usuario->pivot;
                    break;
                }
            }
            if(isset($r->cbDPersonal)){
                $permisos->datosPersonales = true;
                $cambiar = false;
            }
            if(isset($r->cbDFiscal)){
                $permisos->datosFiscales = true;
                $cambiar = false;
            }
            if(isset($r->cbDDomicilio)){
                $permisos->datosDomicilio = true;
                $cambiar = false;
            }
            if(isset($r->cbDBancario)){
                $permisos->datosBancarios = true;
                $cambiar = false;
            }
            if($cambiar){
                $permisos->save();
                return 1;
            }
        }
        return 0;
    }
}
