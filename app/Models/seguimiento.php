<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seguimiento extends Model
{
    protected $fillable = ['usuario_id', 'empresa_id'];
    use HasFactory;
    //Un SEGUIMIENTO pertenece a un USUARIO
    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }
    //Un SEGUIMIENTO pertenece a una EMPRESA
    public function empresa(){
        return $this->belongsTo(Empresa::class);
    }
    //Un SEGUIMIENTO tiene varios RELACION DE DATO
    public function relacionDato(){
        return $this->hasMany(relacionDato::class);
    }
}
