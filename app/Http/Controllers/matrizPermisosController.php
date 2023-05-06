<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Usuario;
use Illuminate\Http\Request;

class matrizPermisosController extends Controller
{
    public function index()
    {
        $usuario = Usuario::find(session('usuario')->id);
        $empresasSiguiendo = $usuario->empresas;
        
        return view('matrizPermisosDatos', compact('empresasSiguiendo'));
    }
}
