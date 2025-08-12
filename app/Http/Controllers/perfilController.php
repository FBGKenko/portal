<?php

namespace App\Http\Controllers;

use App\Models\catalogoDato;
use App\Models\datoGuardado;
use App\Models\Empresa;
use App\Models\grupoDato;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class perfilController extends Controller
{
    public function index()
    {
        //PASAR MENSAJE FLASH
        $mensajeFlash = null;
        if(session()->has('modalFlash')) $mensajeFlash = session('modalFlash');

        $datos = DB::table('catalogo_datos')
            ->leftJoin('dato_guardados', function ($join){
                $join->on('catalogo_datos.id', '=', 'dato_guardados.catalogo_dato_id')
                    ->where('dato_guardados.usuario_id', '=', session('usuario')->id);
            })
            ->select(
                'dato_guardados.usuario_id',
                'catalogo_datos.grupo_dato_id',
                'catalogo_datos.id as catalogoDatoId',
                'catalogo_datos.campoValor',
                'dato_guardados.valor',
                'catalogo_datos.opcional'
            )
            ->get();

        $catalogoDatos = $datos;

        $grupos = grupoDato::get(['id', 'nombre']);
        $gruposYCatalogos = [$grupos, $catalogoDatos];
        $edad = null;
        if (isset(session('usuario')->cumpleanios)){
            $edad = new \DateTime(session('usuario')->cumpleanios);
            $edad = $edad->diff(new \DateTime())->y;
        }
        return view('vistaSesion.configuracion.perfil',
        compact('gruposYCatalogos', 'edad', 'mensajeFlash'));
    }

    public function cambiarModuloDatos(Request $r){
        $reglas = [];
        $mensajes = [];
        foreach ($r->except('_token', 'idModulo') as $key => $value) {
            $datoABuscar = catalogoDato::where('campoValor', str_replace('_', ' ', $key))->first();
            if(isset($datoABuscar)){
                if(!$datoABuscar->opcional){
                    $reglas[$key] = 'required';
                    $mensajes[$key.'.required'] = 'El campo ' . str_replace('_', ' ', $key) . ' es obligatorio';
                }
            }
        }
        $r->validate($reglas, $mensajes);
        // $validador = Validator::make($r->all(), $reglas);
        // if ($validador->fails()) {
        //     return response()->json(['errors' => $validador->errors()], 422);
        // }

        try {
            DB::beginTransaction();
            foreach ($r->except('_token', 'idModulo') as $key => $value) {
                $datoABuscar = catalogoDato::where('campoValor', str_replace('_', ' ', $key))->first();
                if(isset($datoABuscar)){
                    if((!isset($value) && $datoABuscar->opcional == 1) || isset($value)){
                        $datoPrevioGuardado = datoGuardado::where('catalogo_dato_id', $datoABuscar->id)
                        ->where('usuario_id', session('usuario')->id)
                        ->first();
                        if(Isset($datoPrevioGuardado)){
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
