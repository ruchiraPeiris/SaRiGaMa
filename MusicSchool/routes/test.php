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

Route::get('/check', [
    'uses' => 'CourseController@index'
])->middleware('web');

Route::get('/checkk', function(){
    return view('Admin.addCourse') ;
})->middleware('web');

//->middleware(App\Http\Middleware\dummyMiddleware::class)


Route::get('/type', 'CourseController@SignUp');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/got', [
    'middleware' => ['auth'],
    'uses' => function () {
        echo "You are allowed to view this page!";
    }]);

///////////////////////////////////////////////////////////////////////////////////////  checking area

Route::get('/course1', [
    'uses' => 'CourseController@getAllCourses',
    'as' => 'courseDetail'
])->middleware('web');

Route::get('/addCourse1', [
    'uses' => 'CourseController@viewAddCoursePage',
    'as' => 'add_course'
])->middleware('web');

Route::get('/searchCourse', [
    'uses' => 'CourseController@searchCourse',
    'as' => 'search_course'
])->middleware('web');

//Route::post('/saveCourse', [
//    'uses' => 'CourseController@saveCourse',
//    'as' => 'save_course'
//])->middleware('web');



////////////////////////////////////////////////////////////////////////////////////// admin routing
Route::group(array('prefix' => 'admin'), function() {

    Route::get('/', function () {
        return view('Admin.index');
    })->name('admin')->middleware(['auth', 'admin']);

    Route::get('/course', [
        'uses' => 'CourseController@getAllCourses',
        'as' => 'courseDetail'
    ])->middleware(['auth', 'admin']);


    Route::get('/addCourse', [
        'uses' => 'CourseController@viewAddCoursePage',
        'as' => 'add_course1'
    ])->middleware(['auth', 'admin']);


});
////////////////////////////////////////////////////////////////////////////////////// teacher routing

//Route::get('/teacher',function (){
//    return view('Teacher.index');
//})->name('teacher')->middleware(['auth','teacher']);
//


///////////////////////////////////////////////////////////////////////////////////////

Route::get('/', function () {
//   admin = 1 teacher = 2
    if(Auth::check()){
        if(Auth::user()->rank == 1){
//            return redirect()->route('admin');
            return view('Admin.index');
        }else{
//            return redirect()->route('teacher');
            return view('Teacher.index');
        }

        // return redirect()->route('teacher');
    }
    return view('auth.login');
})->name('first_page');


///////////////////////////////////////////////////////////////////////////////////////// course routes
Route::get('/course', [
    'uses' => 'CourseController@getAllCourses',
    'as' => 'courseDetail'
])->middleware('auth');


////////////////////////////////////////////////////////////////////////////////////////

//Route::group(['middleware' => ['web']], function (){
//
//    Route::get('/addCourse', [
//        'uses' => '',
//        'as' => 'add_course'
//    ])->middleware(['auth','admin']);
//
//    Route::get('/course', [
//        'uses' => 'CourseController@getAllCourses',
//        'as' => 'view_course'
//    ])->middleware(['auth','teacher']);
//
//    Route::get('/admin', function () {
//        return view('layouts.adminLayout');
//    });
//    Route::get('/teacher', function () {
//        return view('layouts.teacherLayout');
//    });
//
//    Route::get('/dashboard', [
//        'uses' => 'UserController@getDashboard',
//        'as' => 'dashboard'
//    ]);
//
//
//});




//amali's routes

Route::get('/Salary', function () {
    return view('Teacher.salary');
});

Route::get('/Detail',function(){
    return view('Teacher.teacherDetail');
})->name('teacherDetail');

Route::get('/teacherSalary', 'TeacherSalaryController@getName')->name('teacher_salary');
Route::post('/teacherDetail', 'TeacherSalaryController@getDetail')->name('teacher_detail');
Route::post('/teacherSalaryUpdate', 'TeacherSalaryController@salaryUpdate')->name('salary_update');

//
//Route::get('/teacherSalary', 'TeacherController@getTeacherSalary')->name('teacher_salary');


Route::get('/addStudent', function(){
    return view('Admin.addStudent');

})->name('add_student');

Route::post('/saveStudent', [
    'uses' => 'StudentController@saveStudent',
    'as' => 'save_student'

])->middleware('web');

Route::get('/updateStudent', function(){
    return view('Admin.updateStudent');
})->middleware('web');


Route::get('/addTeacher', function(){
    return view('Admin.addTeacher');
})->middleware('web');

Route::get('/updateTeacher', function(){
    return view('Admin.updateTeacher');
})->middleware('web');

Route::get('/dashboardAdmin', function(){
    return view('Admin.dashboard');
})->name('AdminDashboard')->middleware('web');