<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Http\Request;

class Fee_payment extends Model
{
    public function getAll()
    {
        $modules = DB::select('select * from class_module NATURAL JOIN takes ');
        return $modules;
    }
    public function getAllPayments()
    {
        $modules = DB::select('select paid_date, module_code, student_id, payment_id, paid_amt from class_module NATURAL JOIN takes NATURAL JOIN fee_payment');
        return $modules;
    }
    public function savePayment(Request $request)
    {

        $paid_amount=$request['paid_amt'];
        $takes_id=$request['takes_id'];

        DB::statement("INSERT INTO fee_payment (paid_amt,takes_id) VALUES('$paid_amount','$takes_id')");

    }
}
