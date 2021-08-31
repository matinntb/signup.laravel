<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Professor extends Model
{
    public function courses(){

        return $this->belongsToMany(Course::class,'professor_course')->withPivot('term_id');
    }
}
