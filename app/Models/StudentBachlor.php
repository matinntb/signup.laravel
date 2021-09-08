<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;

class StudentBachlor extends Model
{
    public function course(){
        return $this->morphToMany(Course::class,'CoursTake','course_take','CoursTake_id',
            'course_id');
    }
}
