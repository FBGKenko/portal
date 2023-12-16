<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Empresa extends Model
{
    use HasFactory;
    //Una EMPRESA pertenece a un USUARIO
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
    //Una EMPRESA tiene varios SERVICIO
    public function servicio(){
        return $this->hasMany(servicio::class);
    }
    //Una EMPRESA tiene varios SEGUIMIENTOS
    public function seguimientos(){
        return $this->hasMany(seguimiento::class);
    }


    public static function todasLasEmpresas($idUsuario, $page)
    {
        $siguiendo = DB::table('empresa_usuario')
        ->select('empresa_id')
        ->where('usuario_id', '=', $idUsuario);

        $empresasSiguiendo = DB::table('empresas')
        ->select('id','usuario_id','razonSocial','correoEmpresa','telefonoEmpresa','paginaWeb','created_at','updated_at', DB::raw('"siguiendo" as status'))
        ->joinSub($siguiendo, 'siguiendo', function ($join){
            $join->on('empresas.id', '=', 'siguiendo.empresa_id');
        });

        $idEmpSig = DB::table('empresas')
        ->select('id')
        ->joinSub($siguiendo, 'siguiendo', function ($join){
            $join->on('empresas.id', '=', 'siguiendo.empresa_id');
        });

        $empresasNoSiguiendo = DB::table('empresas')
        ->select('id','usuario_id','razonSocial','correoEmpresa','telefonoEmpresa','paginaWeb','created_at','updated_at', DB::raw('"sinSeguir" as status'))
        ->whereNotIn('id', $idEmpSig);

        $res = DB::table($empresasSiguiendo)
        ->union($empresasNoSiguiendo)
        ->paginate($page);

        return $res;
    }

    public static function todosLosSeguidores($idEmpresa, $razonSocial)
    {
        $usuariosConf = DB::table('usuarios')
        ->select('usuarios.id', 'correo', 'telefono', 'ultimaConexion', 'nombres', 'apellidos', 'tipo', 'cumpleanios', 'origen', 'datosPrivados')
        ->join('configuracions', 'configuracions.usuario_id', '=', 'usuarios.id');

        $seguidores = DB::table('empresa_usuario')
        ->select('usuarios.id', 'correo', 'telefono', 'ultimaConexion', 'nombres', 'apellidos', 'tipo', 'cumpleanios', 'origen', 'datosPrivados')
        ->joinSub($usuariosConf, 'usuarios', function ($join)
        {
            $join->on('empresa_usuario.usuario_id','=','usuarios.id');
        })
        ->where('empresa_id', '=', $idEmpresa)
        ->where('datosPrivados', '=', 'N');

        $clientesRegistrados = DB::table('usuarios')
        ->select('usuarios.id', 'correo', 'telefono', 'ultimaConexion', 'nombres', 'apellidos', 'tipo', 'cumpleanios', 'origen', 'datosPrivados')
        ->join('configuracions', 'configuracions.usuario_id', '=', 'usuarios.id')
        ->where('origen', '=', $razonSocial);

        $res = DB::table($clientesRegistrados)
        ->union($seguidores);

        return $res->paginate(10);
    }

    public static function countTodosLosSeguidores($idEmpresa, $razonSocial)
    {
        $usuariosConf = DB::table('usuarios')
        ->select('usuarios.id', 'correo', 'telefono', 'ultimaConexion', 'nombres', 'apellidos', 'tipo', 'cumpleanios', 'origen', 'datosPrivados')
        ->join('configuracions', 'configuracions.usuario_id', '=', 'usuarios.id');

        $seguidores = DB::table('empresa_usuario')
        ->select('usuarios.id', 'correo', 'telefono', 'ultimaConexion', 'nombres', 'apellidos', 'tipo', 'cumpleanios', 'origen', 'datosPrivados')
        ->joinSub($usuariosConf, 'usuarios', function ($join)
        {
            $join->on('empresa_usuario.usuario_id','=','usuarios.id');
        })
        ->where('empresa_id', '=', $idEmpresa)
        ->where('datosPrivados', '=', 'N');

        $clientesRegistrados = DB::table('usuarios')
        ->select('usuarios.id', 'correo', 'telefono', 'ultimaConexion', 'nombres', 'apellidos', 'tipo', 'cumpleanios', 'origen', 'datosPrivados')
        ->join('configuracions', 'configuracions.usuario_id', '=', 'usuarios.id')
        ->where('origen', '=', $razonSocial);

        $res = DB::table($clientesRegistrados)
        ->union($seguidores);

        return count($res->get());
    }
}
