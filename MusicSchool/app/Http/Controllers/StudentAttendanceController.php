<?php

namespace App\Http\Controllers;

use App\Student_attendance;
use Illuminate\Http\Request;
use Auth;

class StudentAttendanceController extends Controller
{

    #11 Insert to student_attendance table


    public function markStudentAttendance($class_module_id, $class_type)
    {
        return view('Student.markStudentAttendance', [
            'class_module_id' => $class_module_id,
            'class_type' => $class_type
        ]);

    }

    public function saveStudentAttendance($class_module_id, Request $request)
    {
        $id = Auth::user()->id;
        $duration = $request['duration'];

        $array = $request->all();
        reset($array);
        while (list($key, $val) = each($array)) {
            $is_present = false;
            $is_late = false;

            if (is_int($key)){
                if($val == 11){
                    $is_present = true;
                }else if($val == 10){
                    $is_late = true;
                }
                Student_attendance::saveStudentAttendance($key,$class_module_id,$is_present,$is_late );
            }
        }
        Student_attendance::markTeacherAttendance($class_module_id,$id,$duration);
        return redirect()->route('teacher');
    }


    public function getAllStudentAttendance($class_module_id, $class_type)
    {

//        dd($class_module_id);
        $allAttendance = null;
        return view('Student.studentAttendanceHistory', [
            'class_module_id' => $class_module_id,
            'class_type' => $class_type,
            'allAttendance' => $allAttendance
        ]);

    }

    public function getSelectedStudentAttendance($class_module_id, $class_type, Request $request)
    {
        $attendDate = $request['date'];

        $allAttendance = Student_attendance::getAllStudentAttendance($class_module_id, $class_type, $attendDate);
        return view('Student.studentAttendanceHistory', [
            'class_module_id' => $class_module_id,
            'class_type' => $class_type,
            'allAttendance' => $allAttendance
        ]);

    }

    public function StudentAttendancePage($class_module_id, $class_type)
    {

        return view('Teacher.nextFromGroup', [
            'class_module_id' => $class_module_id,
            'class_type' => $class_type
        ]);
    }

}