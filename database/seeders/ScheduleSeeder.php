<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Schedule;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $courses = Course::all();
        $teachers = Teacher::all();
        $jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi'];
        $heuresDebut = ['08:00:00', '09:30:00', '11:00:00', '14:00:00', '15:30:00'];
        $durees = [60, 90, 120]; // En minutes

        if ($courses->isEmpty() || $teachers->isEmpty()) {
            echo "Veuillez exécuter d'abord les seeders pour les cours et pour les enseignants.\n";
            return;
        }

        for ($i = 0 ; $i < 15 ; $i++) { // Crée 15 plannings
            Schedule::create([
                'course_id' => $faker->randomElement($courses->pluck('id')->toArray()),
                'teacher_id' => $faker->randomElement($teachers->pluck('id')->toArray()),
                'jour' => $faker->randomElement($jours),
                'heureDebut' => $faker->randomElement($heuresDebut),
                'duree' => $faker->randomElement($durees),
            ]);
        }
    }
}
