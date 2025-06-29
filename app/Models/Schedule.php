<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'course_id',
        'teacher_id',
        'jour',
        'heureDebut',
        'duree'
    ];

    /* *Un planning appartient à un cours. */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /** Un planning est fait par un enseignant. */
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
