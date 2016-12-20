<?php

namespace App\Http\Controllers;

use App\Class_module;
use App\Hall;
use App\Instrument;
use App\Module;
use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{

    public $modules;
    public $instruments;
    public $halls;
    public $classModules;

    public function getClassRelatedDetail(){

        $this->modules = (new Module())->getAllFromModuleAndInstrument();
        $this->instruments=(new Instrument())->getAll();
        $this->halls=(new Hall())->getAll();
        $this->classModules=(new Class_module())->getAll();


    }

    public function addClassModule(){
        $this->getClassRelatedDetail();
        return view ('Admin.addClassModule',['modules'=>$this->modules,'instruments'=>$this->instruments,'halls'=>$this->halls,'classModules' =>$this->classModules]);
    }

    public function editClassModule($edit_id){

//        dd($edit_id);

        $id =(int)$edit_id;

//        dd($id);
        $present = Class_module::searchByClassModuleId($id);

//        echo $present->module_code;




        $this->getClassRelatedDetail();
//        dd($present,$this->modules);

//        return view('Admin.editClassModule',['present'=>$present]);
        return view ('Admin.editClassModule',['present'=>$present,'modules'=>$this->modules,'instruments'=>$this->instruments,'halls'=>$this->halls,'classModules' =>$this->classModules]);
    }



}
