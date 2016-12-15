<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Student
{
    public function getAllStudents(){
        $all_students = DB::select('SELECT * FROM student');

        return $all_students;
    }

    public function saveStudentAttendance(Request $request){
        $class_module_id = $request['class_module_id'];
        $module_code = $request['module_code'];
        $hall_name = $request['hall_name'];
        $class_type = $request['class_type'];
        $monthly_class_fee = $request['monthly_class_fee'];
        $num_students = $request['num_students'];
        $teacher_fee_percentage = $request['teacher_fee_percentage'];

        DB::statement("INSERT INTO class_module(class_module_id, module_code, hall_name, class_type,monthly_class_fee,num_students,teacher_fee_percentage)
                      VALUES(?,?,?,?,?,?,?), ['$class_module_id','$module_code', '$hall_name', '$class_type','$monthly_class_fee','$num_students','$teacher_fee_percentage']");

    }
//<th>{{ $studentAttendance->student_id }}</th>
//                                <th>{{ $studentAttendance->student_name }}</th>
//                                <th>{{ $studentAttendance->module_code }}</th>
//                                <th>{{ $studentAttendance->module }}</th>    //combination if both module code and class type
//                                <th>{{ $studentAttendance->class_date }}</th>
//                                <th>{{ $studentAttendance->month }}</th>
//                                <th>{{ $studentAttendance->year }}</th>
//                                <th>{{ $studentAttendance->Attendance }}</th>   //whether absent or present


    public function getAllStudentsNameAndId(){
//        $students_name_id = DB::select('SELECT student_id,std_first_name FROM student');
        $students_name_id = DB::select("SELECT student_id, CONCAT(std_first_name, ' ', std_middle_name, ' ', std_last_name) AS student_name FROM student");

//
//        $result = DB::select("SELECT temp.class_date class_date, temp.is_late is_late, temp.is_attend is_attend,
//         CONCAT(temp.std_first_name, ' ', temp.std_last_name) student_name, temp.module_code module_code,  temp.student_id student_id
//        FROM ((SELECT * FROM student_attendance SA LEFT JOIN takes USING(takes_id )
//        LEFT JOIN student ST ON  takes.stduent_id = ST.student_id ) AS T1
//        LEFT JOIN class_module CM ON T1.class_module_id = CM.class_module_id) AS temp")
//

        return $students_name_id;
    }




}
