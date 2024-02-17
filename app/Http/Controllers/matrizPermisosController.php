<?php

namespace App\Http\Controllers;

use App\Models\catalogoDato;
use App\Models\Empresa;
use App\Models\grupoDato;
use App\Models\Permiso;
use App\Models\relacionDato;
use App\Models\seguimiento;
use App\Models\Usuario;
use Illuminate\Http\Request;

class matrizPermisosController extends Controller
{
    public function index()
    {
        if(session()->has('modalFlash')){
            session()->flash('modalFlash', session('modalFlash'));
        }
        $empresasSiguiendo = seguimiento::where('usuario_id', session('usuario')->id)->get();
        $moduloDatos = grupoDato::all();


        return view('vistaSesion.configuracion.matrizPermisosDatos', compact('empresasSiguiendo', 'moduloDatos'));
    }

    public function obtenerPermisos(Request $r){
        if($r->seguimientoId > 0){
            $ModulosCompartidos = relacionDato::where('seguimiento_id', $r->seguimientoId)
            ->join('catalogoDatos', 'relacionDatos.catalogo_dato_id', '=', 'catalogoDatos.id')
            ->join('grupoDatos', 'catalogoDatos.grupo_id', '=', 'grupoDatos.id')
            ->get();

            return $ModulosCompartidos[0]->catalogoDato->grupoDato;
        }
        else{
            return null;
        }
    }

    public function guardarPermisos(Request $r){
        if($r->seguimientoId > 0){
            //OBTENER TODOS LOS CHECKBOX CON SU ESTADO ACTUAL
            foreach ($r->except('_token', 'seguimientoId') as $key => $value) {
                $idModulo = explode('_', $key);
                $catalogos = catalogoDato::where('grupo_dato_id', $idModulo[1])->get();
                //OBTENER TODOS LOS CATALOGO RELACIONADOS A LOS MODULOS
                foreach ($catalogos as $catalogo) {
                    $datoCompartido = relacionDato::where('catalogo_dato_id', $catalogo->id)
                    ->where('seguimiento_id', $r->seguimientoId)
                    ->first();
                    //GUARDAR MODIFICAR SI COMPARTIR O SI NO CREAR EL REGISTRO.
                    if($datoCompartido){
                        $datoCompartido->compartido = $value == 'true' ? true : false;
                        $datoCompartido->save();
                    }
                    else{
                        $guardarComparticion = relacionDato::create([
                            'catalogo_dato_id' => $catalogo->id,
                            'seguimiento_id' => $r->seguimientoId,
                            'compartido' => $value == 'true' ? true : false
                        ]);
                    }
                }
            }
            session()->flash('modalFlash', ['Se han guardado los cambios', 'Éxito', 'success']);
            return redirect()->route('permisos');
        }
        else{
            session()->flash('modalFlash', ['Hubo un error al guardar los cambios', 'Error', 'error']);
            return redirect()->route('permisos');
        }
    }
}
