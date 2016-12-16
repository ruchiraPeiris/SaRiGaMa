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
        var d = new Date();
        d.setFullYear( d.getFullYear() - 100 );
        $('.datepicker').pickadate(
            {
                selectMonths: true,
                selectYears: d,
                max: new Date()
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
                                <input type="text" name="student_id">
                                <label for="student_id">Student ID</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field nom col m4 s12">
                                <input type="text" name="std_first_name" id="std_first_name">
                                <label for="std_first_name">First Name</label>
                            </div>

                            <div class="input-field nom col m4 s12">
                                <input type="text" name="std_middle_name" id="std_middle_name">
                                <label for="std_middle_name">Middle Name</label>
                            </div>

                            <div class="input-field nom col m4 s12">
                                <input type="text" name="std_last_name" id="std_last_name">
                                <label for="std_last_name">Last Name</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field nom col m6 s12">
                                <input type="text" name="std_dob" id="datepicker">
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


                        <div class="card-panel teal lighten-2">
                            <h6>Family Details</h6>
                        </div>

                        <div class="row">
                            <div class="input-field nom col m12 s12">
                                <input type="text" name="parent_guardian_id"/>
                                <label for=" parent_guardian_id">Parent Guardian ID</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field nom col m6 s12">
                                <input type="text" name="p_g_first_name"/>
                                <label for="p_g_first_name">First Name</label>
                            </div>

                            <div class="input-field nom col m6 s12">
                                <input type="text" name="p_g_last_name">
                                <label for="p_g_last_name">Last Name</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field nom col m6 s12">
                                <select name="p_g_gender">
                                    <option value="" disabled selected>Gender</option>
                                    <option value="FEMALE">Female</option>
                                    <option value="MALE">Male</option>
                                </select>
                            </div>
                            <div class="input-field nom col m6 s12">
                                <select name="type">
                                    <option value="" disabled selected>Type</option>
                                    <option value="PARENT">Parent</option>
                                    <option value="GUARDIAN">Guardian</option>
                                </select>
                            </div>


                        </div>
                        <div class="row">
                            <div class="input-field nom col m12 s12">
                                <input type="text" name="sibling_id">
                                <label for="sibling_id">Sibling ID</label>
                            </div>
                        </div>

                        <div class="card-panel teal lighten-2">
                            <h6>Registration Details</h6>
                        </div>

                        <div class="row">
                            <div class="input-field nom col m6 s12">
                                <input type="text" name="registration_fee" value="">
                                <label for="registration_fee">Registration Fee</label>
                            </div>
                            <div class="input-field nom col m6 s12">
                                <input type="text" name="date_registered" id="date_registered" type="date" class="datepicker">
                                <label for="date_registered">Date Registered</label>
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