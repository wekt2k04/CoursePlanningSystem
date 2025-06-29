<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('fr_FR');

        $specialites = ['Informatique', 'Mathématiques', 'Physique', 'Chimie', 'Littérature', 'Histoire', 'Géographie'];

        for($i = 0 ; $i < 5 ; $i++) { // Crée 5 enseignants
            Teacher::create([
                'nom' => $faker->name,
                'specialite' => $faker->randomElement($specialites),
            ]);
        }
    }
}
