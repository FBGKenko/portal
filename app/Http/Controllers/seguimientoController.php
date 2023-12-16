<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Usuario;
use Illuminate\Http\Request;

class seguimientoController extends Controller
{
    public function index()
    {
        $empresas = Empresa::get();
        return view('vistaSesion.seguimiento.seguimiento', compact('empresas'));
    }

    public function seguirEmpresa(Request $r)
    {
        //agregar a la tabla cliente-empresa el id usuario y en id empresa
        return Usuario::seguir(session('usuario')->id, $r->value);

    }


    public function dejarSeguirEmpresa(Request $r)
    {
        //eliminar en la tabla cliente-empresa el id usuario y en id empresa
        return Usuario::noSeguir(session('usuario')->id, $r->value);
    }
}
