<?php

namespace App\Http\Controllers;

use App\Course;
use App\Student;
use App\StudentRegistration;
use Illuminate\Http\Request;
use DB;

class StudentController extends Controller
{
    public function getAllStudents(){

        $all_students = (new Student())->getAllStudents();
        return view('student', [
            'students' => $all_students
        ]);
    }

    public function getAllStudentsNameAndId($class_module_id,$class_type){
        $student_name_id = (new Student())->getAllStudentsNameAndId($class_module_id,$class_type);
        return $student_name_id;
    }

    public function markStudentAttendance($class_module_id, $class_type){
        $student_name_id = $this->getAllStudentsNameAndId($class_module_id,$class_type);
        return view('Teacher.markStudentAttendance', [
            'student_name_id' => $student_name_id,
            'class_module_id' => $class_module_id,
            'class_type' =>$class_type
        ]);
    }

    public function takes(){

        $modules = (new Class_module())->getAvailableClasses();

        return view('Student.takes',[
            'modules' => $modules
        ]);
    }

    public function saveStudentTakes(Request $request){

        Takes::saveTakes($request);   ///edit this


        return view('Admin.dashboard');
    }




//    public function saveStudent(Request $request){
//
//
//        $first_name = $request['std_first_name'];
//        $middle_name = $request['std_middle_name'];
//        $last_name = $request['std_last_name'];
//      //  $address = $request['address'];
//        $gender = $request['gender'];
//        $dob = $request['dob'];
//
//        DB::statement("INSERT INTO student(student_id, std_first_name, std_middle_name, std_last_name, std_gender)
//                      VALUES('10', '$first_name', '$middle_name', '$last_name', 'MALE')");
//
//
//        return redirect()->route('add_student');
//    }

    public function AddStudent()
    {
        return view('Admin.addStudentRegistration');
    }

    public function SaveStudent(Request $request)
    {
        (new StudentRegistration())->SaveStudent($request);
        return redirect()->route('add_student');
    }


//////////////-----nadessshani-----





//    public function getAllCourses(){
//        $all_courses = Course::all();   // fetch data from database
//        return view('Admin.addStudent',[
//            'courses' => $all_courses
//        ]);
//    }
}



//        $this->validate($request,[
//            'std_first_name' => 'required|max:15',
//            'std_middle_name' => 'required|max:15',
//            'std_last_name' => 'required|max:15',
//            'address' => 'required',
//            'gender' => 'required',
//            'dob' => 'required'
//        ]);

