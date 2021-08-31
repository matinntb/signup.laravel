<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \App\Models\Manager;
use App\Models\Field;

class College extends Model
{
    public function manager(){

        return $this->belongsTo(Manager::class);
    }

    public function fields(){

        return $this->hasMany(Field::class);
    }
}
