<?php

namespace App\Http\Controllers;

use App\Fee_payment;
use App\Student;
use Illuminate\Http\Request;

class FeePaymentController extends Controller
{
    public function addPayment(){
//        $modules=(new Fee_payment())->getAll();
//        $students=(new Student())->getAllStudents();
        return view('admin.addPayment');
    }
    public function savePayment(Request $request){
        (new Fee_payment())->savePayment($request);
        return redirect()->route('add_payment');

    }

    public function viewPayments(){
        $modules=(new Fee_payment())->getAllPayments();
        return view('admin.paymentHistory',['modules'=>$modules]);
    }

    public function studentPay(Request $request){
        $modules=(new Student())->getStudentByID($request);
        return view('admin.addPaymentStudent',['modules'=>$modules]);
    }
}
