<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = [
        "nombre",
        "descripcion"
    ];

    
    public function alumnos()
    {
        return $this->hasMany(Alumno::class);
    }
}
