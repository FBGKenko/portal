<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\seguimiento;
use App\Models\servicio;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class perfilEmpresaController extends Controller
{
    public function index($razon){
        $mensajeFlash = null;
        if(session()->has('modalFlash')){
            $mensajeFlash = session('modalFlash');
        }
        $nombre =  str_replace('-', ' ', $razon);
        $empresa = Empresa::where('razonSocial', $nombre)->first();
        if($empresa){
            $servicios = servicio::where('empresa_id', $empresa->id)->get();
            $siguiendo = seguimiento::where('usuario_id', session('usuario')->id)
            ->where('empresa_id', $empresa->id)
            ->first();
            $urlLogo = Storage::disk('public')->files('/empresas/empresa_'.$empresa->id . '/logo');
            $urlEmpresa = Storage::disk('public')->files('/empresas/empresa_'.$empresa->id . '/portada');
            $urlLogo = (count($urlLogo) > 0) ? '/storage/'.$urlLogo[0] : '';
            $urlEmpresa = (count($urlEmpresa) > 0) ? '/storage/'.$urlEmpresa[0] : '';
            return view('vistaSesion.seguimiento.perfilEmpresa',
            compact(
                'empresa',
                'servicios',
                'siguiendo',
                'mensajeFlash',
                'urlLogo',
                'urlEmpresa'
            ));
        }
        else{
            abort(404);
        }
    }

    public function cambiarSeguirEmpresa(Empresa $empresa){
        //COMPROBAR SI EXISTE UNA RELACION PARA VERIFICAR DE SEGUIMIENTO
        $siguiendo = seguimiento::where('usuario_id', session('usuario')->id)
        ->where('empresa_id', $empresa->id)
        ->first();
        //COMPROBAR SI LA EMPRESA EXISTE
        if($empresa){
            DB::beginTransaction();
            try{
                if($siguiendo){
                    $siguiendo->delete();
                    session()->flash('modalFlash', ['Dejaste de seguir a la empresa', 'Exito', 'success']);
                }
                else{
                    $siguiendo = seguimiento::create([
                        'usuario_id' => session('usuario')->id,
                        'empresa_id' => $empresa->id
                    ]);
                    $siguiendo->save();
                    session()->flash('modalFlash', ['Ahora estas siguiendo la empresa', 'Exito', 'success']);
                }
                DB::commit();
                return redirect()->route('verEmpresaPerfil', str_replace(' ', '-', $empresa->razonSocial));
            }
            catch(Exception $e){
                DB::rollBack();
                session()->flash('modalFlash', ['Ha fallado al momento de seguir a la empresa', 'Error', 'error']);
                return redirect()->route('verEmpresaPerfil', str_replace(' ', '-', $empresa->razonSocial));
            }
        }
        else{
            session()->flash('modalFlash', ['Ha fallado al momento de seguir a la empresa', 'Error', 'error']);
            return redirect()->route('verEmpresaPerfil', str_replace(' ', '-', $empresa->razonSocial));
        }
    }
}
