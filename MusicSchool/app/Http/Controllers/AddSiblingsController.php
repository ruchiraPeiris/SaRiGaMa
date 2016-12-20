<?php

namespace App\Http\Controllers;


use App\Sibling;
use Illuminate\Http\Request;

class AddSiblingsController extends Controller
{

    public function AddSibling()
    {
        $siblings = (new Sibling())->getAll();
        return view('Admin.addSiblings', ['siblings' => $siblings]);
    }

    public function SaveSiblings(Request $request){
        (new Sibling())-> SaveSibling($request);
        return redirect()->route('add_sibling');

    }

}
