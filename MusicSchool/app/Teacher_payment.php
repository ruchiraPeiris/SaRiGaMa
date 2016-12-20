<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Http\Request;

class Teacher_payment
{

    public function getAll()
    {
        $teacher_payments = DB::select("select* from teacher_payment");
        return $teacher_payments;
    }


    public  function getTeacher(Request $request){
        $payments=DB::select('select * from teacher_payment where teacher_id="'.$request['teacher_id'].'"');
//        $payments=DB::select('select * from teacher_payment where teacher_id= ');

        return $payments;
    }
    public  function addPayment(Request $request, Teacher $teacher){


        DB::statement("INSERT INTO teacher_payment(teacher_id) VALUES(?)",[$request['teacher_id']]);

    }


}

