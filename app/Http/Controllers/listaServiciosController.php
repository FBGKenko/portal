<?php

namespace App\Http\Controllers;

use App\Models\empresa;
use App\Models\servicio;
use App\Models\suscripcionServicio;
use App\Services\HttpClientService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class listaServiciosController extends Controller
{
    public function index(){
        $servicios = servicio::with('empresa')
        ->whereHas('suscripcionServicio', function($query){
            $query->where('usuario_id', session('usuario')->id);
        })
        ->get();
        $empresas = empresa::withCount('servicio')->get();
        return view('vistaSesion.servicios.listaServicios', compact('servicios', 'empresas'));
    }

    public function verServicio(Request $request){
        $servicio = servicio::findOrFail($request->idServicio);
        switch($servicio->nombre) {
            case 'CATALOGO DE DISTRIBUIDORES':
                $urlBase = 'http://192.168.70.4/';
                $urlBaseImagen = $urlBase . 'storage/';
                $httpClient = new HttpClientService();
                $response = $httpClient->get($urlBase . 'api/lista-distribuidores');
                $data = $response->json();
                return view('vistaSesion.servicios.externos.catalogoDistribuidores',
                    compact('data', 'urlBase', 'urlBaseImagen'));
                break;
            default:

                break;
        }
    }

    public function solicitarServicio(Request $request)
    {
        $servicio = servicio::findOrFail($request->idServicio);
        $suscripcionExistente = suscripcionServicio::where('servicio_id', $servicio->id)
            ->where('usuario_id', session('usuario')->id)
            ->first();
        if ($suscripcionExistente) {
            session()->flash('modalFlash', ['Ya has solicitado este servicio', 'Error', 'warning']);
            return redirect()->back();
        }
        suscripcionServicio::create([
            'servicio_id' => $servicio->id,
            'usuario_id' => session('usuario')->id,
        ]);
        session()->flash('modalFlash', ['Servicio solicitado con éxito', 'Éxito', 'success']);
        return redirect()->back();
    }
}
