<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'course_id',
        'dateInscription',
    ];

    /* Une inscription appartient à un étudiant. */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    /* Une inscription appartient à un cours. */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
