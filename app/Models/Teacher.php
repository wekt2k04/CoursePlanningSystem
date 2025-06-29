<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'specialite',
    ];

    /* Un enseignant peut avoir plusieurs plannings de cours. */
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
