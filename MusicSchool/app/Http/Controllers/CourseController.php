<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
//use View;

class CourseController extends Controller
{

    public function dgetAllCourses(){
        $all_courses = Course::all();   // fetch data from database
        if(Auth::user()->rank == 1){
            return view('Admin.course',[
                'courses' => $all_courses
            ]);
        }else {
            return view('Teacher.course', [
                'courses' => $all_courses
            ]);
        }
    }

    public function saveCourse(Request $request){


        $this->validate($request,[
            'name' => 'required|max:255',
            'module_code' => 'required|max:255',
//            'module_code' => 'required|unique:modules',
            'fee' => 'required|numeric|max:255',
            'type' => 'required',

        ]);

        $name = $request['name'];
        $module_code = $request['module_code'];
        $fee = $request['fee'];
        $type = $request['type'];

        $course = new Course();
        $course->name = $name;
        $course->module_code = $module_code;
        $course->fee = $fee;
        $course->type = $type;

        $course->save();

        return redirect()->route('add_course');

    }

    public function viewAddCoursePage(){
        $all_courses = Course::all();   // fetch data from database
        return view('Admin.addCourse',[
            'courses' => $all_courses
        ]);

    }

    public function searchCourse($id){
        $courses = Course::find($id);
        return view('Admin.course', [
            'courses' => $courses,

        ]);

    }





    public function index(Request $request)
    {

//        $myVar = Request::instance()->query('myVar');

//        $myVar = $request['myVar'];

        $myVar = '1';
        return view('Admin.course',[
            'view' => $myVar
        ]);

//        if($myVar == '1'){
//            return view('Course.dummyCourse',[
//
//            ]);
//
//        }elseif($myVar == '2'){
//            return view('Course.dummyCourse');

        }


        //////////////////////////////////////////////////////////////////// checking area

    public function getAllCourses(){
        $all_courses = Course::all();   // fetch data from database
        return view('Admin.course',[
            'courses' => $all_courses
        ]);
    }


}
