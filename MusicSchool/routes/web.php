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

    Route::post('/saveClassModule', [
        'uses' => 'ClassModuleController@saveClassModule',
        'as' => 'save_class_module'
    ])->middleware(App\Http\Middleware\AdminMiddleware::class);

    Route::post('/searchClassModule', [
        'uses' => 'ClassModuleController@showSearchResults',
        'as' => 'search_class_module'
    ])->middleware(App\Http\Middleware\TeacherMiddleware::class);


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

    Route::get('/markStudentAttendance', [                                /////////////// current
        'uses' => 'StudentController@markStudentAttendance',
        'as' => 'mark_student_attendance'
    ])->middleware(App\Http\Middleware\TeacherMiddleware::class);

    Route::post('/saveStudentAttendance', [                                /////////////// current
        'uses' => 'StudentController@saveStudentAttendance',
        'as' => 'save_student_attendance'
    ])->middleware(App\Http\Middleware\TeacherMiddleware::class);

    Route::get('/check', function () {
        return view('auth.myLogin');
    });

    Route::post('/login', 'UserController@login')->name('login');

    Route::get('/', function(){
        return view('auth.myLogin');
    })->name('loginView');







});