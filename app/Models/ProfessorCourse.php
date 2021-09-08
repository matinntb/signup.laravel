<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Professor;
use App\Models\Course;
use App\Models\Term;

class ProfessorCourse extends Model
{
    protected $table = 'professor_course';

    public function professor(){

        return $this->belongsTo(Professor::class);
    }
    public function course(){

        return $this->belongsTo(Course::class);
    }
    public function students(){

        return $this->belongsToMany(Student::class,'student_course','professor_course_id','student_id')->withPivot('score');
    }
    public function term(){

        return $this->belongsTo(Term::class);
    }
}
