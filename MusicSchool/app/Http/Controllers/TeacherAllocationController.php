<?php

namespace App\Http\Controllers;

use App\TeacherAllocation;
use Illuminate\Http\Request;

class TeacherAllocationController extends Controller
{
    public function AddAllocation(){
        $teacher_id = (new TeacherAllocation())->getAll();

        return view('Admin.teacherAllocation', ['teacher_ids' => $teacher_id]);
    }

    public function SaveAllocation(Request $request){
        (new TeacherAllocation())->saveAllocation($request);
        return redirect()-> route('teacher_allocation');
    }


}
