<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Student_attendance
{
    public function getStudentAttendance_search($request){

        if($request != null){

        $attendance = DB::select("SELECT DATE_FORMAT(SA.class_date, '%d-%b-%Y'), SA.is_late, SA.is_present, CM.module_code, CM.class_type, 
			TA.student_id, CONCAT(ST.std_first_name , ' ', ST.std_last_name) student_name FROM student_attendance SA NATURAL JOIN takes TA 
			NATURAL JOIN class_module CM
			LEFT JOIN student ST 
			ON ST.student_id = TA.student_id 
			WHERE CM.module_code LIKE ? OR CM.class_type LIKE ? OR CONCAT(ST.std_first_name , ' ', ST.std_last_name) LIKE ? OR DATE_FORMAT(SA.class_date, '%d-%b-%Y') LIKE ? "
			                ,[$request."%", $request."%", $request."%", $request."%"]);
        }



    }


    public static function saveStudentAttendance($key,$class_module_id,$is_present,$is_late ){
//        dd($key,$class_module_id,$is_present,$is_late);

        DB::statement("INSERT INTO student_attendance(takes_id, is_late, is_present)
	VALUES((SELECT takes_id FROM takes WHERE student_id = $key AND class_module_id = $class_module_id),?,?)",[$is_late, $is_present]);


    }

    public static function markTeacherAttendance($class_module_id,$id,$duration){

        $class_module_id = (int)$class_module_id;




        $teacher_id = DB::select("SELECT teacher_id FROM teacher_user_account WHERE id = ?",[$id]);

        $teacher_id = $teacher_id[0]->teacher_id;

//        dd($teacher_id);
        DB::statement("insert into class_times(class_module_id, teacher_id,duration_hrs) VALUES(?,?,?)",[$class_module_id,$teacher_id,$duration]);


    }




    #{LAHIRU FINISH THIS}
    # i need all the student attendance for a given class module id. given class is $class.

    public static function getAllStudentAttendance($classModuleId, $classType, $attendDate)
    {



        $allAttendance = DB::select("SELECT student_id, CONCAT(ST.std_first_name , ' ', ST.std_last_name) student_name, SA.is_late late, SA.is_present present
         FROM class_module CM NATURAL JOIN takes NATURAL JOIN student ST NATURAL JOIN student_attendance SA 
         WHERE CM.class_module_id = ? AND CM.class_type = ? AND SA.class_date IS NOT NULL AND DATE(SA.class_date) = ?",[$classModuleId,$classType,$attendDate]);

//        dd($allAttendance);
        return $allAttendance;

    }
}
