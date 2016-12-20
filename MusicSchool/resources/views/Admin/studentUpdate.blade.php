@extends('Admin.index')
@section('title')
    Update Student
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
        d.setFullYear(d.getFullYear() - 100);
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

    <div class="container " style="padding: 5px;">
        <div class="row">
            <div class="col-lg-12">
                <br><br>
                <form action="{{route('update_student')}}" method="POST">
                    {{csrf_field()}}

                    @foreach ($student as $student)

                        <div class="row">

                            <div class="card-panel teal lighten-2">
                                <h6>Student Details</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field nom col m6 s12">
                                <input type="text" name="std_dob" disabled value= "{{ $student->student_id}}">
                                <label for="dob">Date Of Birth</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field nom col m4 s12">
                                <input type="text" name="std_first_name" id="std_first_name"
                                       value="{{ $student->std_first_name}}">
                                <label for="std_first_name">First Name</label>
                            </div>

                            <div class="input-field nom col m4 s12">
                                <input type="text" name="std_middle_name" id="std_middle_name"
                                       value={{ $student->std_middle_name }}>
                                <label for="std_middle_name">Middle Name</label>
                            </div>

                            <div class="input-field nom col m4 s12">
                                <input type="text" name="std_last_name" id="std_last_name"
                                       value="{{ $student->std_last_name }}">
                                <label for="std_last_name">Last Name</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field nom col m6 s12">
                                <input type="text" name="std_dob" value="{{ $student->std_dob}}">
                                <label for="dob">Date Of Birth</label>
                            </div>

                            <div class="input-field nom col m6 s12">
                                <select name="std_gender">
                                    <option disabled selected>{{ $student->std_gender }}</option>
                                    <option value="FEMALE">Female</option>
                                    <option value="MALE">Male</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field nom col m12 s12">
                                <input type="text" name="std_city" value="{{ $student->std_city }}" class="validate" required=""
                                       aria-required="true">
                                <label for="std_city">City</label>
                            </div>

                        </div>

                        <div class="col m5">
                            <p class="right-align">
                                <button id="add-student-profile"
                                        class="btn btn-large waves-effect waves-light midddle"
                                        style="background-color:#378d8f" type="submit" name="action" value="submit">
                                    Save
                                </button>
                            </p>
                        </div>


                    @endforeach
                </form>
            </div>
        </div>
    </div>
@endsection