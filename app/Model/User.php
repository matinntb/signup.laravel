<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users_data';
    public $timestamps = false;
    Protected $guarded=[];

}
