<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\servicio;
use Illuminate\Http\Request;

class perfilEmpresaController extends Controller
{
    public function index($razon){

        $empresa = Empresa::where('razonSocial', $razon)->first();
        if($empresa){
            $servicios = servicio::where('empresa_id', $empresa->id)->get();
            return view('vistaSesion.seguimiento.perfilEmpresa', ['empresa' => $empresa, 'servicios' => $servicios]);
        }
        else{
            abort(404);
        }
    }
}
