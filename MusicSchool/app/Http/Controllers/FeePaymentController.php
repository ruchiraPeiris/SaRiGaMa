<?php

namespace App\Http\Controllers;

use App\Fee_payment;
use Illuminate\Http\Request;

class FeePaymentController extends Controller
{
    public function addPayment(){
        $modules=(new Fee_payment())->getAll();
        return view('admin.addPayment',['modules'=>$modules]);
    }
    public function savePayment(Request $request){
        (new Fee_payment())->savePayment($request);
        return redirect()->route('add_payment');

    }

    public function viewPayments(){
        $modules=(new Fee_payment())->getAllPayments();
        return view('admin.paymentHistory',['modules'=>$modules]);
    }
}
