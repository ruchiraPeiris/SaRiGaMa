<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;
use DB;
class TeacherAllocation extends Model
{

    public function SaveAllocation(Request $request){
        $teacher_id = $request['teacher_id'];
        $class_module_id = $request['class_module_id'];

        DB::statement("INSERT INTO class_teacher_allocation(teacher_id, class_module_id)
                      VALUES('$teacher_id','$class_module_id')");

    }

    public function getAll(){
        $teacher=DB::select("SELECT teacher_id FROM teacher ");
        return $teacher;
    }
}
