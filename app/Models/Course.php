<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Professor;
use App\Models\Student;

class Course extends Model
{
    public function professors(){

        return $this->belongsToMany(Professor::class,'professor_course');
    }
    public function students(){

        return $this->belongsToMany(Student::class,'student_course','professor_course_id')->withPivot('score');
    }

}
