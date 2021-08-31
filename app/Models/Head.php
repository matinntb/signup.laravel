<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Field;
class Head extends Model
{
    public function field(){

        return $this->hasOne(Field::class);
    }
}
