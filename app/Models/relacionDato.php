<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class relacionDato extends Model
{
    use HasFactory;
    //Una RELACION DE DATO pertenece a un SEGUIMIENTO
    public function seguimiento(){
        return $this->belongsTo(seguimiento::class);
    }
    //Una RELACION DE DATO pertenece a un CATALOGO DATO
    public function catalogoDato(){
        return $this->belongsTo(catalogoDato::class);
    }

}
