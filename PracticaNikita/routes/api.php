<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Middleware\ValidateId;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\PerfilController;

Route::get("/user", function (Request $request) {
    return $request->user();
})->middleware("auth:sanctum");

Route::prefix("/alumnos")->controller(AlumnoController::class)->group(function(){
    Route::get("", "index");
    Route::get("{id}", "show")->middleware(ValidateId::class);
    Route::post("", "store");
    Route::put("{id}", "update")->middleware(ValidateId::class);
    Route::delete("{id}", "destroy")->middleware(ValidateId::class);
});

Route::get('alumnos/{id}/perfil', [AlumnoController::class, 'getPerfil']);  
Route::get('alumnos/{id}/curso', [AlumnoController::class, 'getCurso']);    
Route::get('cursos/{id}/alumnos', [CursoController::class, 'getAlumnos']);   
Route::get('perfiles/{id}/alumno', [PerfilController::class, 'getAlumno']);