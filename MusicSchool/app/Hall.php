<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;

class Hall
{
    public function SaveHall(Request $request)
    {
        $hall_name = $request['hall_name'];
        $capacity = $request['capacity'];
        $building_name = $request['building_name'];


        DB::statement("INSERT INTO hall(hall_name, capacity, building_name)
                      VALUES('$hall_name','$capacity', '$building_name')");

    }
    public function getAll(){
        $halls=DB::select("SELECT * FROM hall");
        return $halls;
    }
}
