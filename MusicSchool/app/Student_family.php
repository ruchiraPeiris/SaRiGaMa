<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student_family extends Model
{
    public function students(){
        return $this->hasMany('App\Student');
    }
}
