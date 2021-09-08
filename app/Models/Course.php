<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Professor;
use App\Models\Student;
use App\Models\ProfessorCourse;
use App\Models\StudentBachlor;
use App\Models\StudentMaster;

class Course extends Model
{
    public function professors(){

        return $this->belongsToMany(Professor::class,'professor_course')->withPivot('term_id');
    }
    public function professorCourses(){

        return $this->hasMany(ProfessorCourse::class);
    }
    public function studentBachlor(){

        return $this->morphedByMany(StudentBachlor::class,'CoursTake','course_take',
            'course_id','CoursTake_id');
    }
    public function studentMaster(){

        return $this->morphedByMany(StudentMaster::class,'CoursTake','course_take',
            'course_id','CoursTake_id');
    }
}
