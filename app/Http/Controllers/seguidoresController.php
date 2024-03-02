<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\seguimiento;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class seguidoresController extends Controller
{
    public function index()
    {
        $empresa = Empresa::where('usuario_id', session('usuario')->id)->first();
        $seguidores = seguimiento::where('empresa_id', $empresa->id)->get();
        $clientes = Usuario::where('origen', $empresa->razonSocial)->get(['id', 'nombres', 'apellidos', 'correo']);
        $seguidores = $seguidores->reject(function ($seguidor) use ($clientes){
            foreach ($clientes as $cliente) {
                if($cliente->id == $seguidor->usuario_id){
                    return true;
                }
            }
            return false;
        });
        $numeroSeguidores = count($seguidores);
        $numeroClientes = count($clientes);
        // $seguidores = Empresa::todosLosSeguidores($empresa->id, $empresa->razonSocial);
        // $interesados = Empresa::countTodosLosSeguidores($empresa->id, $empresa->razonSocial);
        // $observadores = count($empresa->usuarios) - $interesados;

        // $futurosClientes = Usuario::all()->count();
        //MOSTRAR UNA LISTA DE CLIENTES, LOS QUE SIGUE, Y UN CONTADOR DE INFORMACION
        $urlLogo = Storage::disk('public')->files('/empresas/empresa_'.$empresa->id . '/logo');
        $urlEmpresa = Storage::disk('public')->files('/empresas/empresa_'.$empresa->id . '/portada');
        $urlLogo = (count($urlLogo) > 0) ? '/storage/'.$urlLogo[0] : '';
        $urlEmpresa = (count($urlEmpresa) > 0) ? '/storage/'.$urlEmpresa[0] : '';
        return view('vistaSesion.seguimiento.seguidores',
        compact('empresa', 'seguidores', 'clientes', 'numeroSeguidores', 'numeroClientes', 'urlLogo', 'urlEmpresa'));
    }
    public function actualizarImagen(Request $r, $empresa, $tipoImagen){
        if ($tipoImagen == "logo") {
            $imagen = $r->file('imagenSubidaPerfil');
            $imageName = 'logo.' . $imagen->getClientOriginalExtension();

            // Guardar la imagen en la carpeta 'public' del almacenamiento
            $imagen->storeAs('public/empresas/empresa_' . $empresa . '/logo', $imageName);

            // Devolver la ruta completa de la imagen
            $imageUrl = asset('storage/empresas/empresa_' . $empresa . '/logo' . $imageName);

            // Puedes retornar la URL de la imagen si deseas
            return response()->json(['url' => $imageUrl]);
        } else if($tipoImagen == "portada"){
            $imagen = $r->file('imagenSubidaFondo');
            $imageName = 'portada.' . $imagen->getClientOriginalExtension();

            // Guardar la imagen en la carpeta 'public' del almacenamiento
            $imagen->storeAs('public/empresas/empresa_' . $empresa . '/portada', $imageName);

            // Devolver la ruta completa de la imagen
            $imageUrl = asset('storage/empresas/empresa_' . $empresa . '/portada' . $imageName);

            // Puedes retornar la URL de la imagen si deseas
            return response()->json(['url' => $imageUrl]);
        }
    }
}
