<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insertar 10 registros con datos falsos
        for ($i = 0; $i < 10; $i++) {
            DB::table("alumno")->insert([
                "nombre" => fake()->name(),
                "telefono" => fake()->phoneNumber(),
                "edad" => fake()->numberBetween(6,  60),
                "password" => fake()->password(),
                "email" => fake()->unique()->safeEmail(),
                "sexo" => fake()->randomElement(["M", "F"]),
            ]);
        }
    }
}
