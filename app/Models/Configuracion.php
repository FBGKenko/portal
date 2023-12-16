<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    use HasFactory;
    //una CONFIGURACION pertenece a un USUARIO
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
