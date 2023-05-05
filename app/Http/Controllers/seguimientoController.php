<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Usuario;
use Illuminate\Http\Request;

class seguimientoController extends Controller
{
    public function index()
    {
        $page = 10;
        $empresas = Empresa::todasLasEmpresas(session('usuario')->id, $page);
        return view('seguimiento', compact('empresas', 'page'));
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
