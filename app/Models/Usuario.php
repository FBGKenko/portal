<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Usuario extends Model
{
    use HasFactory;

    //Un USUARIO puede tener varias EMPRESA
    public function empresas(){
        return $this->hasMany(Empresa::class);
    }
    //un USUARIO puede tener varios SEGUIMIENTOS
    public function seguimientos(){
        return $this->hasMany(seguimiento::class);
    }
    //un USUARIO puede tener una CONFIGURACION
    public function configuracion(){
        return $this->hasOne(Configuracion::class);
    }
    //un USUARIO puede tener un TOKEN
    public function token(){
        return $this->hasOne(Token::class);
    }
    //un USUARIO puede tener varios DATOS GUARDADOS
    public function datosGuardados(){
        return $this->hasMany(datoGuardado::class);
    }
    //un USUARIO puede tener varias SUPCRIPCIONES
    public function suscripcionesServicios(){
        return $this->hasMany(suscripcionServicio::class);
    }
}
