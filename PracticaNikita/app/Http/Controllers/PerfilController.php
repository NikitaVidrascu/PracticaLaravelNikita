<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfil;

class PerfilController extends Controller
{
    public function getAlumno($id)
    {
        $perfil = Perfil::findOrFail($id);
        return $this->sendResponse(true, "Encontrado exitosamente el alumno del perfil", $perfil->alumno);
    }
}
