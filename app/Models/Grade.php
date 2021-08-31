<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Grade extends Model
{
    public function students(){

        return $this->hasMany(Student::class);
    }
}
