<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class servicio extends Model
{
    use HasFactory;
    //Un SERVICIO pertenece a una EMPRESA
    public function empresa(){
        return $this->belongsTo(Empresa::class);
    }
    //Un SERVICIO tiene varios DATOS REQUERIDOS
    public function datosRequeridos(){
        return $this->hasMany(datosRequeridos::class);
    }
    //Un SERVICIO tiene varios SUSCRIPCION DE SERVICIOS
    public function suscripcionServicio(){
        return $this->hasMany(suscripcionServicio::class);
    }
}
