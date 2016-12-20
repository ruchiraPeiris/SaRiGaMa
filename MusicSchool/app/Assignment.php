<?php

namespace App;
use Illuminate\Http\Request;
use DB;


class Assignment
{
    public function SaveAssignment(Request $request,$class_module_id){
        $assignment_id = $request['assignment_id'];
//        $class_module_id = $request['class_module_id'];
        $titled = $request['title'];

        DB::statement("INSERT INTO assignment(assignment_id, class_module_id,title)
                      VALUES('$assignment_id','$class_module_id',$titled)");

    }
}
