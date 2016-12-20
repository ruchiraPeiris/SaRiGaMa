<?php

namespace App;

use DB;
use Illuminate\Http\Request;


class StudentRegistration
{
    /**
     * @param Request $request
     */
    public function SaveStudent(Request $request)
    {
        $student_id = $request['student_id'];
        $std_first_name = $request['std_first_name'];
        $std_middle_name = $request['std_middle_name'];
        $std_last_name = $request['std_last_name'];
        $std_dob = $request['std_dob'];
        $std_gender = $request['std_gender'];
        $std_city=$request['std_city'];
        $std_state=$request['std_state'];
        $std_zip=$request['std_zip'];
        $std_phone=$request['phone_number'];

        $p_g_first_name = $request['p_g_first_name'];
        $p_g_last_name = $request['p_g_last_name'];
        $p_g_gender = $request['p_g_gender'];
        $type = $request['p_g_type'];
        $registration_fee = $request['registration_fee'];
        $pg_phone_number=$request['pg_phone_number'];


//        if((DB::select("select COALESCE(count(student_id),0) from student where student_id = ?",[$student_id])) == 0){
//            //error message box
//        }else{
//            DB::statement("INSERT INTO student(student_id, std_first_name, std_middle_name, std_last_name, std_dob,std_gender,std_city)
//                      VALUES('$student_id', '$std_first_name', '$std_middle_name', '$std_last_name','$std_dob', '$std_gender','$std_city')");
//
//            DB::statement("INSERT INTO parent_guardian(p_g_first_name,p_g_last_name,p_g_gender,p_g_type)
//                      VALUES( '$p_g_first_name', '$p_g_last_name','$p_g_gender', '$type')");
//
//
//            DB::statement("INSERT INTO student_registration(registration_fee,student_id)
//                      VALUES('$registration_fee','$student_id')");
//        }





        if ($this->checkStudent($student_id) == 0) {
            echo 'error';
        } else {
            DB::statement(
                "CALL RegisterStudent(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",
        [$student_id,$std_first_name,$std_middle_name,$std_last_name,$std_dob,$std_gender,$std_city,$std_state,$std_zip,$std_phone,
            $registration_fee,
            $p_g_first_name,$p_g_last_name,$p_g_gender,$type,$pg_phone_number]);

        }
    }

   public function checkStudent($studentId)
   {

       return DB::select("SELECT COUNT(student_id) FROM student WHERE student_id = ?",[$studentId]);
   }

   // public function SaveSibling($studentId, $siblingId)
   // {
   //     if ($studentId != $siblingId && $this->checkStudent($studentId) == 1 && $this->checkStudent($siblingId) == 1) {

   //         DB::statement(
   //             "INSERT INTO sibling(student_id,sibling_id)
   //                   VALUES('$studentId','$siblingId')"
   //         );
   //     }
   // }



    public function getAll($id)
    {

        $student = DB::select(
            "SELECT ST.student_id ,ST.std_first_name, ST.std_middle_name, ST.std_last_name, ST.std_dob,ST.std_dob,ST.std_gender,
            PG.p_g_first_name, PG.p_g_last_name, PG.p_g_type,PG.p_g_gender,sb.sibling_id  FROM student ST NATURAL JOIN student_family NATURAL JOIN parent_guardian PG NATURAL JOIN sibling sb
            WHERE ST.student_id = ?",
            [$id]
        );
        return $student;
    }



//    public function searchClassModule($id){
//
//        //query for search and return all class module related data to be fetched to the table
//        $classModule = DB::select('SELECT * FROM class_module NATURAL JOIN hall NATURAL JOIN module NATURAL JOIN instrument WHERE class_module_id ='.$id);
//
//        return $classModule;
//    }

}
