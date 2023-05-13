<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Usuario extends Model
{
    use HasFactory;

    public function empresa()
    {
        return $this->hasOne(Empresa::class);
    }

    public function empresas()
    {
        /*  HOW TO USE
        $user = Usuario::find(1);
        $res = "";
        foreach ($user->empresas as $empresa) {
            $res .= $empresa->pivot->usuario_id;
        }
        */
        return $this->belongsToMany(Empresa::class);
    }

    public function configuracion()
    {
        return $this->hasOne(Configuracion::class);
    }

    public function permiso()
    {
        return $this->hasOne(Permiso::class);
    }

    public function token()
    {
        return $this->hasOne(Token::class);
    }



    public static function seguir($idUsuario, $idEmpresa)
    {
        return DB::table('empresa_usuario')->insert([
            'usuario_id' => $idUsuario,
            'empresa_id' => $idEmpresa
        ]);
    }

    public static function noSeguir($idUsuario, $idEmpresa)
    {
        return DB::table('empresa_usuario')->where([
            ['usuario_id','=',$idUsuario],
            ['empresa_id','=',$idEmpresa]
        ])->delete();
    }

    public function sonDiferentes()
    {
        # code...
    }
}
