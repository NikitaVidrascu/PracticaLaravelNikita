<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{

    protected $fillable = [
        "nombre",
        "telefono",
        "edad",
        "password",
        "email",
        "sexo"
    ];

    
    public function perfil()
    {
        return $this->hasOne(Perfil::class);
    }

    
    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
}
