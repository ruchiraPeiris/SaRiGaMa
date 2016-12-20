<?php

namespace App;

use DB;
use Symfony\Component\HttpFoundation\Request;


class AssignmentMarks
{
    public function SaveAssignmentMarks(Request $request,$class_module){
        $student_id=$request['student_id'];
        $marks = $request['marks'];
        DB::statement("INSERT INTO student_assignment(student_id,marks)
                      VALUES('$student_id',$marks)");

    }
    public function viewStudentsMarks($class_module_id,$assignment_id){
        $marks= DB::select(
            'select student_id,marks FROM takes WHERE class_module_id= ? assignment_id=?',[$class_module_id,$assignment_id]
        );
        return view('Admin.viewAssignmentMarks', ['marks' => $marks,$class_module_id,$assignment_id]);
    }


}
