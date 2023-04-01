<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class perfilController extends Controller
{
    public function index()
    {
        $empresa = Empresa::where('usuario_id', session('usuario')->id)->first();
        return view('perfil', compact('empresa'));
    }
}
