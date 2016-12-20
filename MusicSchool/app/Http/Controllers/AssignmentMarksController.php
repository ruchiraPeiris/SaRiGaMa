<?php

namespace App\Http\Controllers;

use App\AssignmentAllocation;
use App\AssignmentMarks;
use Symfony\Component\HttpFoundation\Request;

class AssignmentMarksController extends Controller
{
    //================view=======================================
    public function index($class_module_id_)
    {
        $assignments = DB::select('select assignment_id, title FROM assignment WHERE class_module_id= ?',[$class_module_id_]);
        return view('Admin.assignmentView', ['assignments' => $assignments,'class_module_id'=>$class_module_id_]);
    }


    public function ViewAssignmentMarks($class_module_id,$assignment_id){
        $studentsMarks=(new AssignmentMarks())->viewStudentsMarks($class_module_id,$assignment_id);
        return view ('Admin.assignmentMarksView',['studentsMarks'=>$studentsMarks,$class_module_id,$assignment_id]);
    }

    //==================add========================================
    public function AddAssignmentMarks($class_module_id){
        $assignments = DB::select('select assignment_id, title FROM assignment WHERE class_module_id= ?',[$class_module_id]);
        return view('Admin.addAssignmentMarks', ['assignments' => $assignments,'class_module_id'=>$class_module_id]);
    }
    public function AssignmentMarksSheetView($class_module_id,$assignment_id){
        $students= DB::select(
            'select student_id FROM takes WHERE class_module_id= ? assignment_id=?',[$class_module_id,$assignment_id]
        );
        return view('Admin.viewAssignmentStudents', ['marks' => $students,$class_module_id,$assignment_id]);

    }
    public function SaveAssignmentMarks(Request $request,$class_module_id,$assignment_id){
        $array=$request->all();
        while (list($key,$val)=each($array)){
            $takes_id = DB::select("SELECT takes_id from takes where student_id = ? and class_module_id = ?",[$key, $class_module_id]);
            DB::statement("INSERT INTO student_assignment(assignment_id, takes_id, marks) VALUES(?,?,?)",[$assignment_id,$takes_id,$val]);
        }

    }
//    public function SaveAssignmentMarks(Request $request,$class_module_id,$class_type){
//        (new AssignmentAllocation())->SaveAssignmentMarks($request,$class_module_id);
//        return redirect()-> route('add_assignment_allocation');
//    }
//
//    public function ViewAssignmentAllocation($class_module_id){
//        $students=(new AssignmentAllocation())->SaveAssignmentAllocation($class_module_id);
//        return view ('Admin.assignmentView',['students',$students]);
//    }
//
//    public function SaveAssignmentMarks(Request $request,$class_module_id,$class_type){
//        (new AssignmentAllocation())->SaveAssignmentMarks($request,$class_module_id);
//        return redirect()-> route('add_assignment_allocation');
//    }
//
//    public function AddAssignment($class_module_id,$class_type){
//        return view ('Admin.addAssignment',[
//            'class_module_id'=>$class_module_id,
//            'class_type' =>$class_type
//        ]);
//    }
//
//    public function SaveAssignment(Request $request,$class_module_id){
//        (new Assignment())->SaveAssignment($request,$class_module_id);
//        return redirect()-> route('save_assignment');
//    }
}
