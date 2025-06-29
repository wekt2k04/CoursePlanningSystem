<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('fr_FR');

        $courses = [
            ['intitule' => 'Developpement Web Avancé', 'code' => 'DWA101'],
            ['intitule' => 'Bases de Données Relationnelles', 'code' => 'BDR201'],
            ['intitule' => 'Algorithmes et Structures de Données', 'code' => 'ASD301'],
            ['intitule' => 'Intelligence Artificielle', 'code' => 'IA401'],
            ['intitule' => 'Réseaux Informatiques', 'code' => 'RNI501'],
            ['intitule' => 'Programmation Orientée Objet', 'code' => 'POO601'],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
