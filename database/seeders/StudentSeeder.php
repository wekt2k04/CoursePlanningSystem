<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('fr_FR'); // Utiliser les données françaises

        for ($i = 0 ; $i < 10 ; $i++) {
            Student::create([
                'nom' => $faker->name,
                'matricule' => $faker->unique()->randomNumber(8), // Génères un matricule unique de 8 chiffres
                'dateNaissance' => $faker->date('Y-m-d', '2025-01-01'), // Date de naissance avant 2005
            ]);
        }
    }
}
