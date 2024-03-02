<?php

namespace App\Http\Controllers;

use App\Models\catalogoDato;
use App\Models\datoGuardado;
use App\Models\Empresa;
use App\Models\grupoDato;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class perfilController extends Controller
{
    public function index()
    {
        $mensajeFlash = null;
        if(session()->has('modalFlash')){
            $mensajeFlash = session('modalFlash');
        }
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
        return view('vistaSesion.configuracion.perfil',
        compact('empresa', 'gruposYCatalogos', 'datosGenerales', 'edad', 'mensajeFlash'));
    }

    public function cambiarModuloDatos(Request $r){
        try {
            DB::beginTransaction();
            foreach ($r->except('_token', 'idModulo') as $key => $value) {
                $datoABuscar = catalogoDato::where('campoValor', $key)->first();
                if($datoABuscar){
                    if((!isset($value) && $datoABuscar->opcional == 1) || isset($value)){
                        $datoPrevioGuardado = datoGuardado::where('catalogo_dato_id', $datoABuscar->id)
                        ->where('usuario_id', session('usuario')->id)
                        ->first();
                        if($datoPrevioGuardado){
                            $datoPrevioGuardado->valor = $value;
                            $datoPrevioGuardado->save();
                        }
                        else{
                            $datoNuevo = datoGuardado::create([
                                'valor' => $value,
                                'usuario_id' => session('usuario')->id,
                                'catalogo_dato_id' => $datoABuscar->id,
                            ]);
                            $datoNuevo->save();
                        }
                    }
                    else{
                        //ERROR
                    }
                }
            }
            DB::commit();
            session()->flash('modalFlash', ['Se han guardado los cambios', 'Éxito', 'success']);
            return redirect()->route('perfil');
        } catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}
