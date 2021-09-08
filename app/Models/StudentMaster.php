<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class StudentMaster extends Model
{
    public function course(){
        return $this->morphToMany(Course::class,'CoursTake','course_take','CoursTake_id','course_id');
    }
}
