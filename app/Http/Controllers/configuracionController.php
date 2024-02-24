<?php

namespace App\Http\Controllers;

use App\Models\catalogoDato;
use App\Models\Configuracion;
use App\Models\grupoDato;
use App\Models\Usuario;
use Illuminate\Http\Request;

class configuracionController extends Controller
{
    public function index()
    {
        $mensajeFlash = null;
        if(session()->has('modalFlash')){
            $mensajeFlash = session('modalFlash');
        }
        $config = Configuracion::where('usuario_id', session('usuario')->id)->first();
        $catalogoDatos = catalogoDato::leftjoin('dato_guardados', 'catalogo_datos.id', '=', 'dato_guardados.catalogo_dato_id')
        ->where('catalogo_datos.grupo_dato_id', '!=', 1)
        ->get(['catalogo_datos.grupo_dato_id', 'catalogo_datos.id as catalogoDatoId', 'campoValor', 'valor', 'opcional']);
        $grupos = grupoDato::where('id', '!=', 1)->get(['id', 'nombre']);
        $gruposYCatalogos = [$grupos, $catalogoDatos];
        return view('vistaSesion.configuracion.configuracion', compact('gruposYCatalogos', 'mensajeFlash'));
    }

    public function cambiarInfo(Request $r)
    {
        //buscar usuario, comparar cuales estan vacios, comparar cuales son diferentes, si hay cambios realizarlos
        //si no, notificarlo
        $cambio = false;
        $nombres = "";
        $apellidos = "";
        $correo = "";
        $telefono = "";
        $usuario = Usuario::find(session('usuario')->id);
        if(isset($r->txtNombres) ){
            if($r->txtNombres != session('usuario')->nombres){
                $nombres = $r->txtNombres;
                $cambio = true;
            }
            else{
                $nombres = session('usuario')->nombres;
            }
        }
        else{
            $nombres = session('usuario')->nombres;
        }
        if(isset($r->txtApellidos)){
            if($r->txtApellidos != session('usuario')->apellidos){
                $apellidos = $r->txtApellidos;
                $cambio = true;
            }
            else{
                $apellidos = session('usuario')->apellidos;
            }
        }
        else{
            $apellidos = session('usuario')->apellidos;
        }
        if(isset($r->txtCorreo)){
            if($r->txtCorreo != session('usuario')->correo){
                $correo = $r->txtCorreo;
                $cambio = true;
            }
            else{
                $correo = session('usuario')->correo;
            }
        }
        else{
            $correo = session('usuario')->correo;
        }
        if(isset($r->txtTelefono)){
            if($r->txtTelefono != session('usuario')->telefono){
                $telefono = $r->txtTelefono;
                $cambio = true;
            }
            else{
                $telefono = session('usuario')->telefono;
            }
        }
        else{
            $telefono = session('usuario')->telefono;
        }

        $usuario->nombres = $nombres;
        $usuario->apellidos = $apellidos;
        $usuario->correo = $correo;
        $usuario->telefono = $telefono;
        $usuario->save();
        session()->flush();
        session(["usuario" => $usuario]);

        if($cambio)
            return 0;
        else
            return 1;

    }

    public function cambiarContra(Request $r)
    {
        //buscar usuario, cifrar contraseña, actualizar contra
        $usuario = Usuario::find(session('usuario')->id);
        $usuario->clave = password_hash($r->txtContra1, PASSWORD_DEFAULT);
        $usuario->save();
        return $r->all();

    }

    public function cambiarPrivacidad(Request $r)
    {
        return 1;
        //buscar usuario, cambiar datos privados
        $configuracion = Configuracion::where('usuario_id', session('usuario')->id)->first();
        if($r->cbPrivacidad == "on"){
            $configuracion->datosPrivados = "N";
            $configuracion->save();
            return 1;//cambiar datos privados a N
        }
        else{
            $configuracion->datosPrivados = "Y";
            $configuracion->save();
            return 2;//cambiar datos privados a Y
        }
    }

    public function cambiarModuloDatos(Request $r){
        //GUARDAR EN LA BASE DE DATOS EN LA TABLA DATO GUARDADO CON EL USUARIO Y SU VALOR CON UN FOREACH
        return $r;
    }
}
