<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\ProfessorCourse;
class Professor extends Model
{
    public function courses(){

        return $this->belongsToMany(Course::class,'professor_course')->withPivot('term_id');
    }
    public function professorCourse(){

        return $this->hasMany(ProfessorCourse::class);
    }
}
