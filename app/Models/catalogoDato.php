<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catalogoDato extends Model
{
    use HasFactory;
    //Un CATALOGO DE DATOS tiene muchas RELACION DE DATOS
    public function relacionDatos(){
        return $this->hasMany(relacionDato::class);
    }
    //Un CATALOGO DE DATOS tiene muchas DATO GUARDADO
    public function datoGuardado(){
        return $this->hasMany(datoGuardado::class);
    }
    //Un CATALOGO DE DATOS tiene muchas DATO REQUERIDO
    public function datosRequeridos(){
        return $this->hasMany(datosRequeridos::class);
    }
    //Un CATALOGO DE DATOS pertenece a un GRUPO DE DATOS
    public function grupoDato(){
        return $this->belongsTo(grupoDato::class);
    }
}
