<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class CursoController extends Controller
{
    public function getAlumnos($id)
    {
        $curso = Curso::findOrFail($id);
        return $this->sendResponse(true, "Alumnos del curso encontrados exitosamente", $curso->alumnos);
    }
}
