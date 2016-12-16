<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
Use DB;

class TeacherRegisteration
{
    /**
     * @param Request $request
     */
    public function SaveTeacher(Request $request)
    {
        $teacher_id = $request['teacher_id'];
        $t_first_name = $request['t_first_name'];
        $t_middle_name = $request['t_middle_name'];
        $t_last_name = $request['t_last_name'];
        $t_dob = $request['t_dob'];
        $qualifications = $request['qualifications'];


        DB::statement("INSERT INTO teacher(teacher_id,t_first_name,t_middle_name,t_last_name,t_dob,qualifications)

                      VALUES('$teacher_id','$t_first_name', '$t_middle_name','$t_last_name','$t_dob','$qualifications')");

    }
}
