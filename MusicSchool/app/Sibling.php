<?php

namespace App;
use Illuminate\Http\Request;
use DB;


class Sibling
{
    public function SaveSibling(Request $request)
    {
        $student_id = $request['student_id'];
        $sibling_id = $request['sibling_id'];
        DB::statement("INSERT INTO sibling(student_id, sibling_id)
                      VALUES('$student_id','$sibling_id')");

    }
    public function getAll(){
        $students=DB::select("SELECT student_id FROM student ");
        return $students;
    }
}
