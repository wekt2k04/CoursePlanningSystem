<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade'); // Clé étrangère vers students
            $table->foreignId('course_id')->constrained()->onDelete('cascade'); // Clé étrangère vers courses
            $table->date('dateInscription');
            $table->timestamps();

            // S'assurer qu'un étudiant ne peut s'inscrire qu'une seule fois au même cours
            $table->unique(['student_id', 'course_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
