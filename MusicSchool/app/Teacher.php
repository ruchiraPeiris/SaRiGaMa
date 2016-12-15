<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //defining one ot one relationship : reverse

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
