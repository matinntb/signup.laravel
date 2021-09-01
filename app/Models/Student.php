<?php

namespace App\Models;

use App\Models\Field;
use Illuminate\Database\Eloquent\Model;
use App\Models\Grade;
use App\Models\Course;
use App\Models\ProfessorCourse;

class Student extends Model
{
    public function field(){

        return $this->belongsTo(Field::class);
    }
    public function grade(){

        return $this->belongsTo(Grade::class);
    }
    public function courses(){

        return $this->belongsToMany(Course::class,'student_course','student_id','professor_course_id')->withPivot('score');
    }
    public function professorCourses(){

        return $this->belongsToMany(ProfessorCourse::class,'student_course','student_id','professor_course_id');
    }
}
