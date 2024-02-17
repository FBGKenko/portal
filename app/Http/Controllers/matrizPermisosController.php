<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Permiso;
use App\Models\seguimiento;
use App\Models\Usuario;
use Illuminate\Http\Request;

class matrizPermisosController extends Controller
{
    public function index()
    {
        $empresasSiguiendo = seguimiento::where('usuario_id', session('usuario')->id)->get();

        return view('vistaSesion.configuracion.matrizPermisosDatos', compact('empresasSiguiendo'));
    }

    public function obtenerPermisos(){
        
    }

    public function guardarPermisos(){

    }
}
