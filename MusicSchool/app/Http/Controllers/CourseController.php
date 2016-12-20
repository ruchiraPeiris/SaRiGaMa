<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use DB;
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


    public function checkUniqueness($table,$data){
        $primary_key = DB::select('SELECT COLUMN_NAME FROM ? WHERE COLUMN_KEY = PRIMARY '[$table]);

         foreach ($primary_key AS $key){
             if ($key == $data){
                 return true;
             }else{
                 return false;
             }
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



        //////////////////////////////////////////////////////////////////// checking area

    public function getAllCourses(){
        $all_courses = Course::all();   // fetch data from database
        return view('Admin.course',[
            'courses' => $all_courses
        ]);
    }


}
