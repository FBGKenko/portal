<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Usuario;
use Illuminate\Http\Request;

class seguidoresController extends Controller
{
    public function index()
    {
        $empresa = Empresa::where('usuario_id', session('usuario')->id)->first();
        $seguidores = Empresa::todosLosSeguidores($empresa->id, $empresa->razonSocial);
        return view('seguidores', compact('empresa', 'seguidores'));
    }
}
