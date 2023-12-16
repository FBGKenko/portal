<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suscripcionServicio extends Model
{
    use HasFactory;
    //Una SUSCRIPCION DE SERVICIO pertenece a un SERVICIO
    public function servicio(){
        return $this->belongsTo(servicio::class);
    }
    //Una SUSCRIPCION DE SERVICIO pertenece a un USUARIO
    public function usuario(){
        return $this->belongsTo(usuario::class);
    }
}
