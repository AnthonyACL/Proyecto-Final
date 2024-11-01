<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class EmployesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('employes')->insert([
                'nombre' => $faker->name,  // Nombre del empleado
                'salario' => $faker->numberBetween(1000, 50000),  // Salario ficticio
                'posicion' => $faker->jobTitle,  // Cargo ficticio
                'estado' => $faker->randomElement(['activo', 'inactivo']),  // Estado ficticio
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
