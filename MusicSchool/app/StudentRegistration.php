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
        $student_id= $request['student_id'];
        $std_first_name= $request['std_first_name'];
        $std_middle_name = $request['std_middle_name'];
        $std_last_name = $request['std_last_name'];
        $std_dob = $request['std_dob'];
        $std_gender = $request['std_gender'];

        $parent_guardian_id=$request['parent_guardian_id'];
        $p_g_first_name=$request['p_g_first_name'];
        $p_g_last_name=$request['p_g_last_name'];
        $p_g_gender=$request['p_g_gender'];
        $type=$request['type'];

        $sibling_id=$request['sibling_id'];

        $registration_fee=$request['registration_fee'];
        $date_registered=$request['date_registered'];



        DB::statement("INSERT INTO student(student_id, std_first_name, std_middle_name, std_last_name, std_dob,std_gender)
                      VALUES('$student_id', '$std_first_name', '$std_middle_name', '$std_last_name','$std_dob', '$std_gender')");

        DB::statement("INSERT INTO parent_guardian(parent_guardian_id, p_g_first_name,p_g_last_name,p_g_gender,type)
                      VALUES('$parent_guardian_id', '$p_g_first_name', '$p_g_last_name','$p_g_gender', '$type')");

        DB::statement("INSERT INTO sibling(student_id,sibling_id)
                      VALUES('$student_id','$sibling_id')");

        DB::statement("INSERT INTO student_registration(registration_fee,date_registered,student_id)
                      VALUES('$registration_fee','$date_registered','$student_id')");

    }

}
