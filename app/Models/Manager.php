<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\College;
class Manager extends Model
{
    public function college(){

        return $this->hasOne(College::class);
    }
}
