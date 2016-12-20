@extends('Admin.index')
@section('title')
    Add Student
@endsection
@section('style')


    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
    <link href="../../../public/jquery-ui-1.12.1.custom/jquery-ui.css" rel="stylesheet">
    <link href="../../../public/jquery-ui-1.12.1.custom/jquery-ui.min.css" rel="stylesheet">
    <script src="../../../public/jquery-ui-1.12.1.custom/jquery-ui.js" type="text/javascript"></script>
    <script src="../../../public/jquery-ui-1.12.1.custom/jquery-ui.min.js" type="text/javascript"></script>

    {{--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">--}}
    {{--<link rel="stylesheet" href="/resources/demos/style.css">--}}
    {{--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>--}}
    {{--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>--}}



    <script>

        $(document).ready(function () {
            $('select').material_select();
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
                            <div class="input-field nom col m12 s12">
                                <input type="text" name="student_id" class="validate" required="" aria-required="true">
                                <label for="student_id">Student ID</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field nom col m4 s12">
                                <input type="text" name="std_first_name" id="std_first_name" class="validate"
                                       required="" aria-required="true">
                                <label for="std_first_name">First Name</label>
                            </div>

                            <div class="input-field nom col m4 s12">
                                <input type="text" name="std_middle_name" id="std_middle_name" class="validate"
                                       required="" aria-required="true">
                                <label for="std_middle_name">Middle Name</label>
                            </div>

                            <div class="input-field nom col m4 s12">
                                <input type="text" name="std_last_name" id="std_last_name" class="validate" required=""
                                       aria-required="true">
                                <label for="std_last_name">Last Name</label>
                            </div>


                        </div>
                        <div class="row">
                            <div class="input-field nom col m12 s12">
                                <input type="text" name="phone_number" id="phone_number" class="validate" required=""
                                       aria-required="true">
                                <label for="phone_number">Phone Number</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field nom col m6 s12">

                                <input type="text" name="std_dob" id="birthDay">
                                <label for="dob">Date Of Birth</label>
                            </div>

                            <div class="input-field nom col m6 s12">
                                <select name="std_gender">
                                    <option value="" disabled selected>Gender</option>
                                    <option value="FEMALE">Female</option>
                                    <option value="MALE">Male</option>

                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field nom col m12 s12">
                                <input type="text" name="std_city" value="" class="validate" required=""
                                       aria-required="true">
                                <label for="std_city">City</label>
                            </div>

                        </div>


                        <div class="card-panel teal lighten-2">
                            <h6>Family Details</h6>
                        </div>

                        <div class="row">
                            <div class="input-field nom col m6 s12">
                                <input type="text" name="p_g_first_name" class="validate" required=""
                                       aria-required="true"/>
                                <label for="p_g_first_name">First Name</label>
                            </div>

                            <div class="input-field nom col m6 s12">
                                <input type="text" name="p_g_last_name" class="validate" required=""
                                       aria-required="true">
                                <label for="p_g_last_name">Last Name</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field nom col m6 s12">
                                <select name="p_g_gender" class="validate" required="" aria-required="true">
                                    <option value="" disabled selected>Gender</option>
                                    <option value="FEMALE">Female</option>
                                    <option value="MALE">Male</option>
                                </select>
                            </div>
                            <div class="input-field nom col m6 s12">
                                <select name="p_g_type" class="validate" required="" aria-required="true">
                                    <option value="" disabled selected>Type</option>
                                    <option value="PARENT">Parent</option>
                                    <option value="GUARDIAN">Guardian</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field nom col m12 s12">
                                <input type="text" name="pg_phone_number" id="phone_number" class="validate" required=""
                                       aria-required="true">
                                <label for="phone_number">Phone Number</label>
                            </div>
                        </div>

                        <div class="card-panel teal lighten-2">
                            <h6>Registration Details</h6>
                        </div>

                        <div class="row">
                            <div class="input-field nom col m12 s12">
                                <input type="text" name="registration_fee" value="" class="validate" required=""
                                       aria-required="true">
                                <label for="registration_fee">Registration Fee</label>
                            </div>

                        </div>

                        <div class="col m5">
                            <p class="right-align">
                                <button id="add-student-profile" class="btn btn-large waves-effect waves-light midddle"
                                        style="background-color:#378d8f" type="submit" name="action" value="submit">Save
                                </button>
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