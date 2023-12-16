<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grupoDato extends Model
{
    use HasFactory;
    //Un GRUPO DE DATOS tiene varios DATOS
    public function catalogoDato(){
        return $this->hasMany(catalogoDato::class);
    }
}
