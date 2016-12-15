<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;

class Module
{

    public function getAll(){
        $modules = DB::select('SELECT * FROM module');
        return $modules;
    }

    public function saveModule(Request $request){
        $module_code = $request['module_code'];
        $instrument_id = $request['instrument_id'];

        DB::statement("INSERT INTO module(module_code, instrument_id)
                      VALUES('$module_code','$instrument_id')");

    }
    // add new module to the database
//    public function addModule(){
//        DB::statement("INSERT INTO student(student_id, std_first_name, std_middle_name, std_last_name, std_gender)
//                      VALUES('10', '$first_name', '$middle_name', '$last_name', 'MALE')");
//
//    }



}
