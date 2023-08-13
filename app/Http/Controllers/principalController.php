<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Usuario;
use Illuminate\Http\Request;

class principalController extends Controller
{
    public function index()
    {
        return view('vistaSesion.principal');
    }

    public function cerrarSesion()
    {
        if(session()->has('usuario')){
            session()->forget('usuario');
        }
        return route('index');
    }
}
