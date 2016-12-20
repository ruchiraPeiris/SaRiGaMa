<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class viewTeacherController extends Controller
{
    public function index()
    {
        $teacher = DB::select(
            'select t_first_name, t_middle_name,t_last_name,t_dob, 	qualifications FROM teacher'
        );

        return view('Admin.viewTeacher', ['teacher' => $teacher]);
    }
}
