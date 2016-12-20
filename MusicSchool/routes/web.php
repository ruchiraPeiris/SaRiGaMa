<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

///////////////////////////////////////////////////////////////
Route::get('/admin/a', function () {

    if(Auth::check()){
        if(Auth::user()->account_type == "A"){

            return view('Admin.addInstrument');
        }else{
            return view('Admin.index');
        }

    }
    else{
        return view('auth.myLogin');
    }

})->name('first_page');

Route::get('/type', 'CourseController@SignUp');

Auth::routes();

Route::get('/home', 'HomeController@index');

///////////////////////////////////////////////////// admin

Route::group(['middleware' => ['web']], function (){

    Route::get('/admin', function () {
        return view('Admin.dashboard');
    })->name('admin')->middleware(App\Http\Middleware\AdminMiddleware::class);


    Route::get('/teacher', function () {
        return view('Teacher.dashboard');
    })->name('teacher')->middleware(App\Http\Middleware\TeacherMiddleware::class);

    Route::get('/addClassModule', [
        'uses' => 'AdminController@addClassModule',
        'as' => 'add_class_module'
    ])->middleware(App\Http\Middleware\AdminMiddleware::class);

    Route::get('/editClassModule/{edit_id}', [
        'uses' => 'AdminController@editClassModule',
        'as' => 'edit_class_module'
    ])->middleware(App\Http\Middleware\AdminMiddleware::class);            /////////////////////////current

    Route::post('/saveClassModule', [
        'uses' => 'ClassModuleController@saveClassModule',
        'as' => 'save_class_module'
    ])->middleware(App\Http\Middleware\AdminMiddleware::class);

    Route::post('/updateClassModule/{id}', [
        'uses' => 'ClassModuleController@updateClassModule',
        'as' => 'update_class_module'
    ])->middleware(App\Http\Middleware\AdminMiddleware::class);

    Route::get('/searchClassModule/{id}', [
        'uses' => 'ClassModuleController@showSearchResults',
        'as' => 'search_class_module_by_id'
    ])->middleware(App\Http\Middleware\TeacherMiddleware::class);


//    Route::post('/searchClassModule', [
//        'uses' => 'ClassModuleController@showSearchResults',
//        'as' => 'search_class_module'
//    ])->middleware(App\Http\Middleware\TeacherMiddleware::class);


    Route::post('/viewClassModule/searchClassModule', [
        'uses' => 'ClassModuleController@showSearchResultsToViewPage',
        'as' => 'search_class_module_in_view'
    ])->middleware(App\Http\Middleware\TeacherMiddleware::class);

    Route::get('/viewClassModule', [
        'uses' => 'ClassModuleController@getAll',
        'as' => 'view_class_module'
    ])->middleware(App\Http\Middleware\TeacherMiddleware::class);


    Route::get('/addInstrument', function () {
        return view('Admin.addInstrument');
    })->name('add_instrument')->middleware(App\Http\Middleware\AdminMiddleware::class);;

    Route::post('/saveInstrument', [
        'uses' => 'InstrumentController@saveInstrument',
        'as' => 'save_instrument'
    ])->middleware(App\Http\Middleware\AdminMiddleware::class);

    Route::get('/addHall', [
        'uses' => 'HallController@AddHall',
        'as' => 'add_hall'
    ])->middleware(App\Http\Middleware\AdminMiddleware::class);

    Route::post('/saveHall', [
        'uses' => 'HallController@SaveHall',
        'as' => 'save_hall'
    ])->middleware(App\Http\Middleware\AdminMiddleware::class);


    Route::get('/addModule', [
        'uses' => 'ModuleController@AddModule',
        'as' => 'add_module'
    ])->middleware(App\Http\Middleware\AdminMiddleware::class);

    Route::post('/saveModule', [
        'uses' => 'ModuleController@SaveModule',
        'as' => 'save_module'
    ])->middleware(App\Http\Middleware\AdminMiddleware::class);


    ////////////////////////////////////////////////////////////////////////////////////

    Route::get('/getGroupClasses', [                                ///////////////used
        'uses' => 'TeacherController@getGroupClasses',
        'as' => 'get_group_classes'
    ])->middleware(App\Http\Middleware\TeacherMiddleware::class);

    Route::get('/getIndividualClasses', [                                ///////
        'uses' => 'TeacherController@getIndividualClasses',
        'as' => 'get_individual_classes'
    ])->middleware(App\Http\Middleware\TeacherMiddleware::class);



    Route::get('/markStudentAttendance/{class_module_id}/{class_type}', [ /////////////// current
        'uses' => 'StudentController@markStudentAttendance',
        'as' => 'mark_student_attendance'
    ])->middleware(App\Http\Middleware\TeacherMiddleware::class);

    Route::get('/studentAttendanceHistory/{class_module_id}/{class_type}', [             /////////////// used
        'uses' => 'StudentAttendanceController@getAllStudentAttendance',
        'as' => 'get_student_attendance'
    ])->middleware(App\Http\Middleware\TeacherMiddleware::class);


    Route::get('/getSelectedStudentAttendance/{class_module_id}/{class_type}',[       // used
        'uses' => 'StudentAttendanceController@getSelectedStudentAttendance',
        'as' => 'get_selected_student_attendance'
    ]);



    Route::get('/studentAttendance/{class_module_id}/{class_type}', [                                ////////// used
        'uses' => 'StudentAttendanceController@StudentAttendancePage',
        'as' => 'student_attendance_page'
    ])->middleware(App\Http\Middleware\TeacherMiddleware::class);


    Route::post('/saveStudentAttendance/{class_module_id}', [                                /////////////// current
        'uses' => 'StudentAttendanceController@saveStudentAttendance',
        'as' => 'save_student_attendance'
    ])->middleware(App\Http\Middleware\TeacherMiddleware::class);

    ////////////////////////////////////////////////////////////////////////////////////////////////

    Route::get('/check', function () {
        return view('auth.myLogin');
    });

    Route::post('/login', 'UserController@login')->name('login');

    Route::get('/', function(){
        return view('auth.myLogin');
    })->name('loginView');

/////////////----amali---/////////////////

    Route::get('/AddTeacherSalary', [
        'uses' => 'TeacherController@getTeachers',
        'as' => 'teacher_salary'
    ])->middleware(App\Http\Middleware\AdminMiddleware::class);

    Route::post('/GetTeacherDetails', [
        'uses' => 'TeacherController@getTeacher',
        'as' => 'teacher_detail'
    ])->middleware(App\Http\Middleware\AdminMiddleware::class);

    Route::post('/SaveSalary', [
        'uses' => 'TeacherController@addSalary',
        'as' => 'save_salary'
    ])->middleware(App\Http\Middleware\AdminMiddleware::class);

    Route::get('/AddPayment', [
        'uses' => 'FeePaymentController@addPayment',
        'as' => 'add_payment'
    ])->middleware(App\Http\Middleware\AdminMiddleware::class);

    Route::post('/SavePayment', [
        'uses' => 'FeePaymentController@savePayment',
        'as' => 'save_payment'
    ])->middleware(App\Http\Middleware\AdminMiddleware::class);

    Route::get('/PaymentHistory', [
        'uses' => 'FeePaymentController@viewPayments',
        'as' => 'payment_history'
    ])->middleware(App\Http\Middleware\AdminMiddleware::class);

    Route::get('/AddModule', [
        'uses' => 'ModuleController@addModule',
        'as' => 'add_module'
    ])->middleware(App\Http\Middleware\AdminMiddleware::class);


    Route::post('/Register', [
        'uses' => 'UserController@register',
        'as' => 'my_register'
    ]);


    ////////////nadeeshani

    //====================================================================
    Route::get('/addStudent', [
        'uses' => 'StudentController@AddStudent',
        'as' => 'add_student'
    ]);
    Route::post('/saveStudent', [
        'uses' => 'StudentController@SaveStudent',
        'as' => 'save_student'
    ]);
    Route::get('/studentViewRecords',[
        'uses' => 'ViewStudentController@index',
        'as' => 'student_records'
    ]);

    //=====================================================================================
    Route::get('/addSiblings',[
        'uses' => 'addSiblingsController@AddSibling',
        'as' => 'add_sibling'
    ]);
    Route::post('/saveSiblings', [
        'uses' => 'AddSiblingsController@SaveSiblings',
        'as' => 'save_siblings'
    ]);
    Route::get('/siblingsRecords',[
        'uses' => 'ViewSiblingsController@index',
        'as' => 'student_siblings'
    ]);

    //========================================================================
    Route::get('/addTeacher',[
        'uses' => 'AddTeacherController@AddTeacher',
        'as' => 'add_teacher'
    ]);
    Route::post('/saveTeacher', [
        'uses' => 'AddTeacherController@SaveTeacher',
        'as' => 'save_teacher'
    ]);
    Route::get('/teacherRecords',[
        'uses' => 'ViewTeacherController@index',
        'as' => 'teacher_records'
    ]);

    //=========================================================================


    //============================================================================
    Route::get('/teacherAllocation',[
        'uses' => 'TeacherAllocationController@AddAllocation',
        'as' => 'teacher_allocation'
    ]);
    Route::post('/teacherAllocation', [
        'uses' => 'TeacherAllocationController@SaveAllocation',
        'as' => 'save_teacher_allocation'
    ]);

    //===============================================================================
    Route::get('/addAssignment/{class_module_id}/{class_type}',[
        'uses' => 'AssignmentController@AddAssignment',
        'as' => 'add_assignment'
    ]);
    Route::post('/saveAssignment/{class_module_id}', [
        'uses' => 'AssignmentController@SaveAssignment',
        'as' => 'save_assignment'
    ]);

    //=================================================================================
    Route::get('viewAssignments/{class_module_id}',[
        'uses' =>'AssignmentMarksController@index',
        'as'=> 'view_assignments'
    ]);

    Route::get('viewStudentMarks/{class_module_id}/{assignment_id}',[
        'uses'=>'AssignmentMarksController@ViewAssignmentMarks',
        'as' => 'view_assignment_marks'
    ]);

    //========================================================================================
    Route::get('viewAssignments/{class_module_id}',[
        'uses' =>'AssignmentMarksController@AddAssignmentMarks',
        'as'=> 'add_assignment_marks'
    ]);

    Route::get('viewAssignmentMarksSheet/{class_module_id}/{assignment_id}',[
        'uses' =>'AssignmentMarksController@AssignmentMarksSheetView',
        'as'=> 'view_assignment_marks_sheet'
    ]);
    Route::post('/saveAssignmentMarks/{class_module_id}/{class_type}', [
        'uses' => 'AssignmentMarksController@SaveAssignmentMarks',
        'as' => 'save_student_marks'
    ]);


//    Route::get('/viewStudentsMarks/{class_module_id}/{class_type} ',[
//        'uses' => 'AssignmentAllocationController@ViewAssignmentMarks',
//        'as' => 'view_assignment_marks'
//    ]);
//    Route::post('/saveAssignmentAllocation/{class_module_id}/{class_type}', [
//        'uses' => 'AssignmentAllocationController@SaveAssignmentMarks',
//        'as' => 'save_assignment_marks'
//    ]);
//
//    Route::get('addAssignmentMarks/{class_module_id}',[
//        'uses' => 'AssignmentMarksController@AddAssignmentMarks',
//        'as' => 'add_assignment_marks'
//    ]);

    //===================================================================================
    Route::get('/studentEditRecords',[
        'uses' => 'StudentUpdateController@index',
        'as' => 'edit_student_records'
    ]);
    Route::get('studentViewRecords/{id}',[
        'uses' => 'StudentUpdateController@show',
        'as' => 'view_student_records'
    ]);
    Route::post('/updateStudent', [
        'uses' => 'StudentUpdateController@update',
        'as' => 'update_student'
    ]);



    //=====================================================================================
    Route::get('/teacherAllocation',[
        'uses' => 'teacherAllocationController@index',
        'as' => 'edit_student_records'
    ]);

    //=========================================================================================
    Route::get('/teacherAllocation',[
        'uses' => 'TeacherAllocationController@AddAllocation',
        'as' => 'teacher_allocation'
    ]);
    Route::post('/teacherAllocation', [
        'uses' => 'TeacherAllocationController@SaveAllocation',
        'as' => 'save_teacher_allocation'
    ]);
    ///////////////////////////nadeeshani


    ////////////////////////////////////////////////////////////////// saj new
    Route::get('/studentTakes', [
        'uses' => 'StudentController@takes',
        'as' => 'student_take'
    ])->middleware(App\Http\Middleware\AdminMiddleware::class);

    Route::post('/saveStudentTakes', [
        'uses' => 'StudentController@saveStudentTakes',
        'as' => 'save_student_take'
    ])->middleware(App\Http\Middleware\AdminMiddleware::class);


});