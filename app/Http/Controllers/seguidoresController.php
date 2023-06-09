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
        $interesados = Empresa::countTodosLosSeguidores($empresa->id, $empresa->razonSocial);
        $observadores = count($empresa->usuarios) - $interesados;
        
        $futurosClientes = Usuario::all()->count();

        return view('seguidores', compact('empresa', 'seguidores', 'futurosClientes', 'observadores'));
    }
}
