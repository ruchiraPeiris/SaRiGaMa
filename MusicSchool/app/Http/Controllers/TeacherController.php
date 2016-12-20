<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\Teacher_payment;
use Illuminate\Http\Request;
use Auth;

class TeacherController extends Controller
{
    public function getTeacherSalary(){
        $name=teacher::all(['name','id']);
        return view('teacherSalary',[
            'names' => $name
        ]);
    }

    public function getGroupClasses(){
        $id = Auth::user()->id;
        $groupClass = (new Teacher())->getGroupClasses($id);
        return view('Teacher.group',['groupClass'=>$groupClass]);

    }

    public function getIndividualClasses(){
        $id = Auth::user()->id;
        $individualClasses = (new Teacher())->getIndividualClasses($id);

        return view('Teacher.individual',['individualClasses'=>$individualClasses]);

    }

    ////////-----amali
    public function getSalary(){
//        $name=teacher::all(['name','id']);
        $salaries=(new Teacher_payment())->getAll();
        return view('teacherSalary',[
            'salries' => $salaries
        ]);
    }
    public function getTeachers(){
//        $name=teacher::all(['name','id']);
        $teachers=(new Teacher())->getAll();
        return view('admin.teacherSalary',[
            'teachers' => $teachers
        ]);
    }

    public function getTeacher(Request $request){
//        $name=teacher::all(['name','id']);
        $teacher=(new Teacher())->getTeacher($request);
        $salaries=(new Teacher_payment())->getTeacher($request);
        return view('admin.teacherDetail',[
            'teacher' => $teacher, 'salaries'=>$salaries
        ]);
    }

    public function addSalary(Request $request,Teacher $teacher){

        (new Teacher_payment())->addPayment($request,$teacher);
        return redirect()->route('teacher_salary');
    }

}
