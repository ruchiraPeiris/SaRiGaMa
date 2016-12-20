<?php

namespace App;
//use Auth;
use DB;
use Illuminate\Http\Request;

//use Illuminate\Database\Eloquent\Model;

class Teacher
{
    public $groupClasses;
    public $individualClasses;

    public function getGroupClasses($id){

        $groupClasses = DB::select("SELECT CM.* FROM teacher_user_account AS TUA NATURAL JOIN teacher NATURAL JOIN class_teacher_allocation NATURAL JOIN class_module AS CM WHERE TUA.id = ? AND CM.class_type = 'GROUP'",[$id]);

//        $groupClasses = DB::select("SELECT CM.* FROM teacher_user_account AS TUA NATURAL JOIN teacher NATURAL JOIN class_teacher_allocation NATURAL JOIN class_module AS CM WHERE TUA.id = ?",[$id]);

        $this->groupClasses = $groupClasses;
        return $this->groupClasses;
    }
    public function getIndividualClasses($id){

//        $result = DB::select("SELECT * FROM class_module NATURAL JOIN class_teacher_allocation NATURAL JOIN teacher WHERE teacher.teacher_id = ? AND class_module.class_type = 'GROUP'",[$teacherId]);
//        $individualClasses = DB::select("SELECT CM.* FROM teacher_user_account AS TUA NATURAL JOIN teacher NATURAL JOIN class_teacher_allocation NATURAL JOIN class_module AS CM WHERE teacher.teacher_id = ? AND class_module.class_type = 'INDIVIDUAL'",[$id]);
        $individualClasses = DB::select("SELECT CM.* FROM teacher_user_account AS TUA NATURAL JOIN teacher NATURAL JOIN class_teacher_allocation NATURAL JOIN class_module AS CM WHERE TUA.id = ? AND CM.class_type = 'INDIVIDUAL'",[$id]);


        $this->individualClasses = $individualClasses;
        return $this->individualClasses;
    }
    /////////====amali
    public  function getAll(){
        $teachers=DB::select('select * from teacher');
        return $teachers;
    }

    public  function getTeacher(Request $request){
        $teacher=DB::select('select * from teacher where teacher_id="'.$request['teacher_id'].'"');
        return $teacher;
    }
}
