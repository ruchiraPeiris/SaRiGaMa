@extends('Admin.index')
@section('title')
    Add Student
@endsection
@section('style')


    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
    <link href="../../../public/css/jquery-ui.css" rel="stylesheet">
    <link href="../../../public/css/jquery-ui.min.css" rel="stylesheet">
    <script src="../../../public/js/jquery-ui.js" type="text/javascript"></script>
    <script src="../../../public/js/jquery-ui.min.js" type="text/javascript"></script>

    <script>
        $(document).ready(function () {
            $('select').material_select();
        });
        $(function () {
            $("#datepicker").datepicker();
        });

        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+2;

        var yyyy = today.getFullYear();
        if(dd<10){
            dd='0'+dd
        }
        if(mm<10){
            mm='0'+mm
        }
        var today = dd+'/'+mm+'/'+yyyy;
        window.onload = function() {

            document.getElementById("date").innerHTML=today;
        }

        $( document ).ready(function(attendance) {

            document.getElementById("attendance").value = attendance;

        });

    </script>
@endsection


@section('content')
    @if(count($errors)>0)
        <div class="row">
            <div class="col-lg-12">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                    @endforeach

                </ul>

            </div>

        </div>
    @endif

    <form action="{{route('save_student')}}" method="POST">
        {!!csrf_field()!!}


        <div class="container " style="padding: 5px;">
            <div class="row">
                <div class="col-lg-12">
                    <br><br>
                    <div class="row">

                        <div class="card-panel teal lighten-2">
                            <h6>Student Details</h6>
                        </div>

                        <div class="row">
                            <div class="input-field nom col m4 s12">
                                <input type="text" name="std_first_name" value="" id="std_first_name">
                                <label for="std_first_name">First Name</label>
                            </div>

                            <div class="input-field nom col m4 s12">
                                <input type="text" name="std_middle_name" value="" id="std_middle_name">
                                <label for="std_middle_name">Middle Name</label>
                            </div>

                            <div class="input-field nom col m4 s12">
                                <input type="text" name="std_last_name" value="" id="std_last_name">
                                <label for="std_last_name">Last Name</label>
                            </div>
                        </div>

                        <div class="row">
                            {{--<div class="input-field nom col m6 s12">--}}
                                {{--<input type="text" name="address" value="" id="address">--}}
                                {{--<label for="address">Address</label>--}}
                            {{--</div>--}}
                            <div class="input-field nom col m6 s12">
                                <input type="text" name="'dob" id="dob" >
                                <label for="dob">Date Of Birth</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field nom col m6 s12">
                                <select multiple name="modules">

                                    {{--@foreach($courses as $course)--}}
                                        {{--<tr>--}}
                                            {{--<option value={{$course->id}}>{{$course->name}}</option>--}}
                                        {{--</tr>--}}
                                    {{--@endforeach--}}

                                </select>
                            </div>
                            <div class="input-field nom col m6 s12">
                                <select name="gender">
                                    <option value="" disabled selected>Gender</option>
                                    <option value="1">Female</option>
                                    <option value="2">Male</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-panel teal lighten-2">
                            <h6>Family Details</h6>
                        </div>
                        <div class="input-field nom col m4 s12">
                            <input type="text" name="parent_guardian" value=""/>
                            <label for="first_name">Parent Guardian ID</label>
                        </div>

                        <div class="input-field nom col m4 s12">
                            <input type="text" name="first_name" value=""/>
                            <label for="middle_name">First Name</label>
                        </div>

                        <div class="input-field nom col m4 s12">
                            <input type="text" name="last_name" value="">
                            <label for="last_name">Last Name</label>
                        </div>
                        <div class="row">
                            <div class="input-field nom col m6 s12">
                                <select name="gender">
                                    <option value="" disabled selected>Gender</option>
                                    <option value="1">Female</option>
                                    <option value="2">Male</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-panel teal lighten-2">
                            <h6>Registration Details</h6>
                        </div>
                        <div class="input-field nom col m4 s12">
                            <input type="text" name="registration_fee" value="">
                            <label for="last_name">Registration Fee</label>
                        </div>
                        <div class="input-field nom col m4 s12">
                            <input type="text" name="date" id="date" >
                            <label for="last_name">Date Registered</label>
                        </div>



                        <div class="col m5">
                            <p class="right-align">
                                {{--<button id="add-student-profile" class="btn btn-large waves-effect waves-light midddle"--}}
                                        {{--style="background-color:#00838f" type="submit" name="action" value="submit">Add Student Profile--}}
                                {{--</button>--}}

                                <button type="submit" class="btn btn-default" style="float:left;  color: #d9edf7; background-color: #2a88bd" value="submit">Save</button>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
            <a class="btn-floating btn-large red" href="">
                <i class="extar-large material-icons">home</i>
            </a>
        </div>

    </form>
@endsection