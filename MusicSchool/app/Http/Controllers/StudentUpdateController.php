<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;


class StudentUpdateController extends Controller
{
    public function index()
    {
        $student = DB::select('select student_id, std_first_name FROM student');

        return view('Admin.student_edit_view', ['student' => $student]);
    }


    public function show($id)
    {
        $student = DB::select(
            'select student_id,std_first_name,std_middle_name,std_last_name,std_dob,std_gender,std_city,
          p_g_first_name,p_g_last_name, p_g_type, p_g_gender 
 from student NATURAL JOIN parent_guardian NATURAL JOIN student_family where student_id = ?',
            [$id]
        );

        return view('Admin.studentUpdate', ['student' => $student]);
    }

    public function update(Request $request)
    {
        $student_id = $request['student_id'];
        $std_first_name = $request['std_first_name'];
        $std_middle_name = $request['std_middle_name'];
        $std_last_name = $request['std_last_name'];
        $std_dob = $request['std_dob'];
        $std_gender = $request['std_gender'];
        $std_city = $request['std_city'];


        DB::update(
            "UPDATE student(student_id, std_first_name, std_middle_name, std_last_name, std_dob,std_gender,std_city)
                      VALUES('$student_id', '$std_first_name', '$std_middle_name', '$std_last_name','$std_dob', '$std_gender','$std_city') WHERE student_id=?,[$student_id]"
        );


    }


}