<?php

namespace App;

use Illuminate\Http\Request;
use DB;
class Class_module
{
    public function saveClassModule(Request $request){
        $class_module_id = $request['class_module_id'];
        $module_code = $request['module_code'];
        $hall_name = $request['hall_name'];
        $class_type = $request['class_type'];
        $monthly_class_fee = $request['monthly_class_fee'];
        $num_students = $request['num_students'];
        $teacher_fee_percentage = $request['teacher_fee_percentage'];

        DB::statement("INSERT INTO class_module(class_module_id, module_code, hall_name, class_type,monthly_class_fee,num_students,teacher_fee_percentage)
                      VALUES(?,?,?,?,?,?,?)",[$class_module_id,$module_code, $hall_name, $class_type,$monthly_class_fee,$num_students,$teacher_fee_percentage]);

    }

#{LAHIRU FINISH THIS}
    public function searchClassModule($id){

        //query for search and return all class module related data to be fetched to the table
//        $classModule = DB::select('SELECT * FROM class_module NATURAL JOIN hall NATURAL JOIN module NATURAL JOIN instrument WHERE class_module_id ='.$id);

        $classModule = DB::select("SELECT * FROM class_module NATURAL JOIN hall NATURAL JOIN module NATURAL JOIN instrument WHERE class_module_id LIKE :id OR instrument_name LIKE :id OR class_type LIKE :id OR hall_name LIKE :id",array('id'=> $id."%"));

        dd($classModule);
        return $classModule;
    }

    public function getAll(){
        $classModules = DB::select('SELECT * FROM class_module NATURAL JOIN hall NATURAL JOIN module NATURAL JOIN instrument');
        return $classModules;
    }
}
