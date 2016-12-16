<?php

namespace App\Http\Controllers;

use App\TeacherRegisteration;
use Illuminate\Http\Request;

class addTeacherController extends Controller
{
    public function AddTeacher(){
        return view('Admin.addTeacher');
    }

    public function SaveTeacher(Request $request){
        ( new TeacherRegisteration())-> SaveTeacher($request);
        return redirect()->route('add_teacher');
    }

}
