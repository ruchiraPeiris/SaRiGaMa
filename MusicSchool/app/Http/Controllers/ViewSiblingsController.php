<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class ViewSiblingsController extends Controller
{
    public function index()
    {
        $student = DB::select(
            'select student_id, sibling_id FROM sibling'
        );

        return view('Admin.viewSiblings', ['student' => $student]);
    }
}
