@extends('layouts.master')

@section('side-bar')
    <h4>SaRigaMa MusIc</h4>
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#section1">Dashboard</a></li>
        <li><a href={{route('add_class_module')}}>Add Class Module</a></li>
        <li><a href="{{route('view_class_module')}}">View Class Modules</a></li>
        <li><a href="{{route('add_hall')}}">Add Hall</a></li>
        <li><a href="{{route('add_module')}}">Add Module</a></li>
        {{--<li><a href="#">Class Room</a></li>--}}
        <li><a href="{{route('add_payment')}}">Add Payment</a></li>
        <li><a href="{{route('payment_history')}}">Payment history</a></li>
        <li><a href="{{route('teacher_salary')}}">Teacher salary</a></li>
        {{--<li><a href="#section2">Teacher Salary's History</a></li>--}}
        {{--<li><a href="{{route('add_student')}}">Add Student</a></li>--}}
        <li><a href="{{route('add_student')}}">Add Student</a></li>
        <li><a href="{{route('student_records')}}">All Student</a></li>
        <li><a href="{{route('edit_student_records')}}">Update Student</a></li>
        <li><a href="{{route('add_sibling')}}">Add sibling</a></li>
        <li><a href="{{route('student_siblings')}}">View siblings</a></li>
        <li><a href="#section3">Leave Student</a></li>
        <li><a href="{{route('teacher_records')}}">View Teacher</a></li>
        <li><a href="{{route('add_teacher')}}">Add Teacher</a></li>
        <li><a href="{{route('teacher_allocation')}}">Allocate Teacher</a></li>
        <li><a href="#section3">Leave Teacher</a></li>
        <li><a href="#section3">Assignment Summary</a></li>
        {{--<li><a href={{route('mark_student_attendance')}}>Student Attendance</a></li>--}}
        <li><a href="#section2">Teacher Attendance</a></li>
        <li><a href="#section2">Teacher Attendance History</a></li>
        <li><a href="#">Student Attendance History</a></li>
        <li><a href="{{route('add_instrument')}}">Add Instrument</a></li>

    </ul><br>
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Search Blog..">
        <span class="input-group-btn">
                <button class="btn btn-default" type="button">
                <span class="glyphicon glyphicon-search"></span>
                </button>
                </span>
    </div>


@endsection