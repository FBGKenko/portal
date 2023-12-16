<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datoGuardado extends Model
{
    use HasFactory;
    //un DATO GUARDADO pertenece a un USUARIO
    public function usuario(){
        return $this->belongsTo(usuario::class);
    }
    //un DATO GUARDADO pertenece a un CATALOGO DE DATOS
    public function catalogoDato(){
        return $this->belongsTo(catalogoDato::class);
    }
}
