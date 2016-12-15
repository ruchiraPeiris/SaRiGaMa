<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student_attendance extends Model
{
    public function getStudentAttendance($request){

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
}
