<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $students = Student::all();
        $courses = Course::all();

        if ($students->isEmpty() || $courses->isEmpty()) {
            echo "Veuillez d'abord exécuter les seeders pour les étudiants et les cours.\n";
            return;
        }

        foreach($students as $student) {
            // Chaque étudiant s'inscrit à 2 ou à 3 cours aléatoirement.
            $numCourses = $faker->numberBetween(2, 3);
            $randomCourses = $courses->random($numCourses);

            foreach ($randomCourses as $course) {
                // Vérifier si l'inscription existe déjà pour éviter les doublons (si la contrainte unique est là).
                $existingEnrollment = Enrollment::where('student_id', $student->id)
                                                ->where('course_id', $course->id)
                                                ->first();
                if (!$existingEnrollment) {
                    Enrollment::create([
                        'student_id' => $student->id,
                        'course_id' => $course->id,
                        'dateInscription' => $faker->date('Y-m-d', 'now'),
                    ]);
                }
            }
        }
    }
}
