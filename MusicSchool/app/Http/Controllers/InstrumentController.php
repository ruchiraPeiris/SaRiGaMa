<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Instrument;
use Illuminate\Http\Request;

class InstrumentController extends Controller
{

    public function saveInstrument(Request $request)
    {

        (new Instrument())->saveInstrument($request);

        return redirect()->route('add_instrument');
    }

    public function getAll()
    {
        $instruments = (new Instrument())->getAll();
       return $instruments;

    }

}
