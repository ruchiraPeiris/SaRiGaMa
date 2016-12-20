<?php

namespace App;
use Auth;
use Illuminate\Http\Request;
use DB;
class Class_module
{
    public function saveClassModule(Request $request){
        $class_start_time = $request['class_start_time'];
        $module_code = $request['module_code'];
        $hall_name = $request['hall_name'];
        $class_type = $request['class_type'];
        $class_fee_per_hr = $request['class_fee_per_hr'];
        $num_students = $request['num_students'];
        $teacher_fee_percentage = $request['teacher_fee_percentage'];

        DB::statement("INSERT INTO class_module(module_code, hall_name, class_type,class_fee_per_hr,num_students,teacher_fee_percentage,class_start_time)
                      VALUES(?,?,?,?,?,?,?)",[$module_code, $hall_name, $class_type,$class_fee_per_hr,$num_students,$teacher_fee_percentage,$class_start_time]);

    }

    public static function editClassModule(Request $request, $id1){
        $id = (int)$id1;
//        $module_code = $request['module_code'];
//        $hall_name = $request['hall_name'];
        $class_type = $request['class_type'];
        $class_fee_per_hr = $request['class_fee_per_hr'];
        $num_students = $request['num_students'];
        $teacher_fee_percentage = $request['teacher_fee_percentage'];


        DB::statement('UPDATE class_module SET class_fee_per_hr = ? ,num_students = ? ,teacher_fee_percentage = ?,class_type = ? WHERE class_module_id = ?',[$class_fee_per_hr,$num_students,$teacher_fee_percentage,$class_type,$id]);

//        DB::statement("INSERT INTO class_module(module_code, hall_name, class_type,monthly_class_fee,num_students,teacher_fee_percentage)
//                      VALUES(?,?,?,?,?,?,?)",[$module_code, $hall_name, $class_type,$monthly_class_fee,$num_students,$teacher_fee_percentage]);

    }


    #{LAHIRU FINISH THIS}
    public function searchClassModule($id){
//        dd($id);
        //query for search and return all class module related data to be fetched to the table
//        $classModule = DB::select("SELECT * FROM class_module NATURAL JOIN hall NATURAL JOIN module NATURAL JOIN instrument WHERE instrument_name LIKE :id1 OR class_type LIKE :id2 OR hall_name LIKE :id3",array('id1'=> $id."%"),array('id2'=> $id."%"),array('id3'=> $id."%"));

        $classModule = DB::select("SELECT * FROM class_module NATURAL JOIN hall NATURAL JOIN module NATURAL JOIN instrument WHERE class_module_id = ? ",[$id]);
//        dd($classModule);

        return $classModule;
    }

    public function getAll(){
        $classModules = DB::select('SELECT * FROM class_module NATURAL JOIN hall NATURAL JOIN module NATURAL JOIN instrument');
        return $classModules;
    }

    public function getAvailableClasses(){
        $classModules =  DB::select("SELECT * from class_module natural join hall NATURAL JOIN module NATURAL JOIN instrument where hall.capacity > class_module.num_students");
        return $classModules;
    }

    public static function searchByClassModuleId($id){

//        dd($id);
        $present = DB::select('SELECT * FROM class_module NATURAL JOIN hall NATURAL JOIN module NATURAL JOIN instrument WHERE class_module_id = ?',[$id]);

//        dd($present);
        return $present;
    }

}
