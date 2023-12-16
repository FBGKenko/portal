<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datoRequerido extends Model
{
    use HasFactory;
    //Un DATO REQUERIDO pertenece a un CATALOGO DE DATOS
    public function catalogoDatos(){
        return $this->belongsTo(catalogoDato::class);
    }
    //Un DATO REQUERIDO perenece a un SERVICIO
    public function servicio(){
        return $this->belongsTo(servicio::class);
    }
}

