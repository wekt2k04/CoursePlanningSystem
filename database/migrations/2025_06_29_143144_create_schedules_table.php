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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->onDelete('cascade'); // Clé étrangère vers courses
            $table->foreignId('teacher_id')->constrained()->onDelete('cascade'); // Clé étrangère vers teachers
            $table->string('jour'); // ex: Lundi, Mardi
            $table->time('heureDebut');
            $table->integer('duree'); // Durée en minutes ou heures
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
