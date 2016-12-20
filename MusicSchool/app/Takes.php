<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Takes extends Model
{
    public static function saveTakes($request){
        $class_module_id = $request['class_module_id'];
        $student_id = $request['student_id'];

        DB::statement("CALL EnrollTake(class_module_id,student_id) VALUES (?,?)",[$class_module_id,$student_id]);

    }
}
