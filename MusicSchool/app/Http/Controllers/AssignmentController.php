<?php

namespace App\Http\Controllers;
use App\Assignment;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function AddAssignment($class_module_id,$class_type){
        return view ('Admin.addAssignment',[
            'class_module_id'=>$class_module_id,
            'class_type' =>$class_type
        ]);
    }

    public function SaveAssignment(Request $request,$class_module_id){
        (new Assignment())->SaveAssignment($request,$class_module_id);
        return redirect()-> route('save_assignment');
    }
}
