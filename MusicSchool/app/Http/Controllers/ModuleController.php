<?php

namespace App\Http\Controllers;

use App\Instrument;
use App\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{

//    public function saveModule(Request $request){
//        $class_module_id = $request['class_module_id'];
//        $module_code = $request['module_code'];
//        $hall_name = $request['hall_name'];
//        $class_type = $request['class_type'];
//        $monthly_class_fee = $request['monthly_class_fee'];
//        $num_student = $request['num_student'];
//        $teacher_fee_percentage = $request['teacher_fee_percentage'];
//
//
//        DB::statement("INSERT INTO student(student_id, std_first_name, std_middle_name, std_last_name, std_gender)
//                      VALUES('10', '$first_name', '$middle_name', '$last_name', 'MALE')");
//    }
    public function AddModule(){
        $instruments = (new Instrument())->getAll();
        return view ('Admin.addModule',['instruments'=>$instruments]);
    }

    public function SaveModule(Request $request){
        (new Module())->SaveModule($request);
        return redirect()-> route('add_module');
    }

    public function GetAll(){
        $modules=(new Module())->getAll();
        return $modules;
    }

}
