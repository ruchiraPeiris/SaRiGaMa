<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class ViewStudentController extends Controller
{
    public function index()
    {
        $student = DB::select(
            'select student_id, std_first_name,std_middle_name,std_last_name,std_dob,std_gender,std_city,
              p_g_first_name,p_g_last_name,p_g_gender,p_g_type FROM student NATURAL JOIN parent_guardian NATURAL JOIN student_family'
        );

        return view('Admin.viewStudent', ['student' => $student]);
    }
}
