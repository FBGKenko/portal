<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class listaServiciosController extends Controller
{
    public function index(){
        
        return view('vistaSesion.servicios.listaServicios');
    }
}
