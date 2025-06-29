<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'intitule',
        'code',
    ];

    /* Un cours peut avoir plusieurs étudiants inscrits */
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'enrollments', 'course_id', 'student_id')
                    ->withPivot('dateInscription');
    }

    /* Un cours peut avoir plusieurs plannings. */
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    /*
    Un cours peut être associé à plusieurs enseignants via les plannings.
    ==> Relation directe via Schedule, mais on peut la définir pour faciliter l'accès
    */
    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class, 'schedules', 'course_id', 'teacher_id');
    }
}
