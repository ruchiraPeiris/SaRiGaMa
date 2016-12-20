<?php

namespace App\Http\Controllers;

use App\Hall;
use Illuminate\Http\Request;

class HallController extends Controller
{
    public function AddHall(){

        return view ('Admin.addHall');
    }
    public function SaveHall(Request $request){
        ( new Hall())->SaveHall($request);
        return redirect()-> route('add_hall');
    }
    public function GetAll(){
        $halls=(new Hall())->getAll();
        return $halls;
    }

}
