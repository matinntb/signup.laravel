<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Head;
use App\Models\College;
use App\Models\Student;

class Field extends Model
{
    public function head(){

        return $this->belongsTo(Head::class);
    }
    public function college(){

        return $this->belongsTo(College::class);
    }
    public function students(){

        return $this->hasMany(Student::class);
    }
}
