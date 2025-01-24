<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $fillable = [
        "alumno_id",
        "direccion",
        "telefono"
    ];

    
    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }
}
