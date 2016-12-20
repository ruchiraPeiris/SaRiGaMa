<?php

namespace App\Http\Controllers;

use App\Class_module;
use App\Hall;
use App\Instrument;
use App\Module;
use Illuminate\Http\Request;

class ClassModuleController
{
//    public function getAllCourses(){
//        $all_courses = Course::all();   // fetch data from database
//        if(Auth::user()->rank == 1){
//            return view('Admin.course',[
//                'courses' => $all_courses
//            ]);
//        }else {
//            return view('Teacher.course', [
//                'courses' => $all_courses
//            ]);
//        }
//    }

    public function saveClassModule(Request $request){

        (new Class_module())->saveClassModule($request);
//        (new Module())->saveModule($request);

        return redirect()->route('add_class_module');

    }

    public function updateClassModule($id, Request $request){
        Class_module::editClassModule($request,$id);
        return view('Admin.dashboard');
    }

    public function GetAll(){
        $classModules=(new Class_module())->getAll();
        return view('Admin.viewClassModule',[
            'classModules'=>$classModules
        ]);
    }


    # get group classes of A teacher by his or her teacher_id passing value is user_account -> id
//    public function getGroupClasses(){
//        $user_name = Auth::user()->user_id;
//        $groupClasses = DB::select("SELECT DISTINCT CM.module_code FROM user_account ");
//
//    }

//    public function viewAddCoursePage(){
//        $all_courses = Course::all();   // fetch data from database
//        return view('Admin.addCourse',[
//            'courses' => $all_courses
//        ]);
//
//    }
//
    public function searchModule($request)
    {

        $id =(int)$request;

        $classModule = (new Class_module())->searchClassModule($id);

        return $classModule;
    }



    public function showSearchResultsToViewPage(Request $request){
        $classModules=$this->searchModule($request);
        return view ('Admin.viewClassModule',['classModule' => $classModules]);

    }

    public function showSearchResults($request){
        $modules = (new Module())->getAll();
        $instruments=(new Instrument())->getAll();
        $halls=(new Hall())->getAll();
        $classModules=$this->searchModule($request);

        return view ('Admin.viewClassModule',['modules'=>$modules,'instruments'=>$instruments,'halls'=>$halls,'classModules' => $classModules]);

    }



//
//    }




}
