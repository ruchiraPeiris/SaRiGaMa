<?php

namespace App;
use DB;
use Illuminate\Http\Request;

class Instrument
{
    //
    public function saveInstrument(Request $request){
        $instrument_id = $request['instrument_id'];
        $instrument_name = $request['instrument_name'];
        $category = $request['category'];
        $details = $request['details'];

        DB::statement("INSERT INTO instrument(instrument_id, instrument_name, category, details)
                      VALUES('$instrument_id','$instrument_name', '$category', '$details')");

    }

    public function getInstrumentId(Request $request){
        $name = $request['instrument_name'];

        $id = DB::select('SELECT instrument_id FROM instrument WHERE instrument_name='.$name);

        return $id;
    }

    public function getAll(){
        $instruments = DB::select('SELECT * FROM instrument ');

        return $instruments;
    }



//    public function courses()
//    {
//        return $this->belongsToMany('App\Course');
//    }


}
