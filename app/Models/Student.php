<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany; // Important pour many-to-many

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'matricule',
        'dateNaissance',
    ];

    /* Un étudiant peut s'inscrire à plusieurs cours. */
    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'enrollments', 'student_id', 'course_id')
                    ->withPivot('dateInscription'); // Récupère également la colonne dateInscription de la table pivot
    }

    /* Un étudiant a plusieurs inscriptions. */
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
