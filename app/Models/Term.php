<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProfessorCourse;

class Term extends Model
{
    public function professorCourse(){

        return $this->hasMany(ProfessorCourse::class);
    }
}
