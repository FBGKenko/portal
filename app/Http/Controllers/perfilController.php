<?php

namespace App\Http\Controllers;

use App\Models\catalogoDato;
use App\Models\Empresa;
use App\Models\grupoDato;
use Illuminate\Http\Request;

class perfilController extends Controller
{
    public function index()
    {
        $empresa = Empresa::where('usuario_id', session('usuario')->id)->first();
        //PENDIENTE POR IMPLEMENTAR LOS DATOS GENERALES EN EL CATALOGO DATO
        $datosGenerales = catalogoDato::where('grupo_dato_id', 1)->get();
        $catalogoDatos = catalogoDato::leftjoin('dato_guardados', 'catalogo_datos.id', '=', 'dato_guardados.catalogo_dato_id')
        ->where('grupo_dato_id', '!=', 1)
        ->get(['catalogo_datos.grupo_dato_id', 'catalogo_datos.id as catalogoDatoId', 'campoValor', 'valor']);
        $grupos = grupoDato::where('id', '!=', 1)->get(['id', 'nombre']);
        $gruposYCatalogos = [$grupos, $catalogoDatos];
        $edad = null;
        if (isset(session('usuario')->cumpleanios)){
            $edad = new \DateTime(session('usuario')->cumpleanios);
            $edad = $edad->diff(new \DateTime())->y;
        }
        return view('vistaSesion.configuracion.perfil', compact('empresa', 'gruposYCatalogos', 'datosGenerales', 'edad'));
    }
}
