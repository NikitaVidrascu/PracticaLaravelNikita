<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Alumno;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $alumnos = DB::table("alumno")->get();
            if ($alumnos->isEmpty()) {
                throw new \Exception("No hay alumnos registrados");
            }
            return $this->sendResponse(true, "Alumnos obtenidos exitosamente", $alumnos);

        } catch (\Exception $e) {
            return $this->sendResponse(false, $e->getMessage(), null, 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $validated = $request->validate([
                "nombre" => "required|string|max:32",
                "telefono" => "nullable|string|max:16",
                "edad" => "nullable|integer",
                "password" => "required|string|max:64",
                "email" => "required|string|email|max:64|unique:alumno",
                "sexo" => "required|string",
            ]);
            $id = DB::table("alumno")->insertGetId($validated);
            $alumno = DB::table("alumno")->find($id);
            return $this->sendResponse(true, "Alumno creado exitosamente", $alumno, 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return $this->sendResponse(false, "Datos no válidos", $e->errors(), 422);
        } catch (\Exception $e) {
            return $this->sendResponse(false, "Error inesperado", $e->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {

            $alumno = DB::table("alumno")->find($id);
            if (!$alumno) {
                throw new \Exception("Alumno no encontrado");
            }
            return $this->sendResponse(true, "Alumno encontrado", $alumno);
            
        } catch (\Exception $e) {
            // Captura el error y devuelve una respuesta con el mensaje
            return $this->sendResponse(false, $e->getMessage(), null, 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Validar los datos recibidos
            $validated = $request->validate([
                "nombre" => "required|string|max:255",
                "telefono" => "nullable|string|max:16",
                "edad" => "nullable|integer",
                "password" => "nullable|string|min:6", // Opcional para no encriptar
                "email" => "required|string|email|max:255|unique:alumno,email," . $id,
                "sexo" => "required|string|max:1",
            ]);

            $updated = DB::table("alumno")->where("id", $id)->update($validated);

            if ($updated === 0) {
                return $this->sendResponse(false, "Alumno no encontrado o no hubo cambios", null, 404);
            }

            $alumno = DB::table("alumno")->find($id);

            return $this->sendResponse(true, "Alumno actualizado exitosamente", $alumno);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $this->sendResponse(false, "Datos no válidos", $e->errors(), 422);
        } catch (ModelNotFoundException $e) {
            return $this->sendResponse(false, "Alumno no encontrado", $e->getMessage(), 404);
        } catch (\Exception $e) {
            return $this->sendResponse(false, "Error inesperado", $e->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $deleted = DB::table("alumno")->where("id", $id)->delete();

            if ($deleted === 0) {
                return $this->sendResponse(false, "Alumno no encontrado", null, 404);
            }

            return $this->sendResponse(true, "Alumno eliminado exitosamente", null);
        } catch (ModelNotFoundException $e) {
            return $this->sendResponse(false, "Alumno no encontrado", $e->getMessage(), 404);
        } catch (\Exception $e) {
            return $this->sendResponse(false, "Error inesperado", $e->getMessage(), 500);
        }
    }

    
    public function getPerfil($id)
    {
        $alumno = Alumno::find($id);
        return $this->sendResponse(true, "Perfil del alumno encontrado exitosamente", $alumno->perfil);
    }

    
    public function getCurso($id)
    {
        $alumno = Alumno::find($id);
        return $this->sendResponse(true, "Curso del alumno encontrado exitosamente", $alumno->curso);
    }
}
