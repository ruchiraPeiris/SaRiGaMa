@extends('Admin.index')
@section('title')
    Add Teacher
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
    </script>

@endsection

@section('content')

    <form action="{{route('save_teacher')}}" method="POST">
        {!!csrf_field()!!}

        <div class="container " style="padding: 5px;">
            <div class="row">
                <div class="col-lg-12">
                    <br><br>

                    <div class="row">
                        <div class="card-panel teal lighten-2">
                            <h6>Teacher Details</h6>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field nom col m12 s12">
                            <input type="text" name="teacher_id"/>
                            <label for="teacher_id">ID Number</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field nom col m4 s12">
                            <input type="text" name="t_first_name" value=""/>
                            <label for="t_first_name">First Name</label>
                        </div>
                        <div class="input-field nom col m4 s12">
                            <input type="text" name="t_middle_name" value="">
                            <label for="t_middle_name">Middle Name</label>
                        </div>
                        <div class="input-field nom col m4 s12">
                            <input type="text" name="t_last_name" value="">
                            <label for="t_last_name">Last Name</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field nom col m12 s12">
                            <input type="text" name="t_dob">
                            <label for="t_dob">Date Of Birth</label>
                        </div>

                        <div class="input-field nom col m12 s12">
                            <input type="text" name="qualifications">
                            <label for="qualifications">Qualification</label>
                        </div>
                    </div>

                    <div class="row">
                        <p class="right-align">
                            <button id="save"
                                    class="btn btn-large waves-effect waves-light midddle"
                                    style="background-color:#00838f" type="submit" name="action">Save
                            </button>
                        </p>
                    </div>

                    <div class="row">
                        <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                            <a class="btn-floating btn-large red" href="">
                                <i class="extar-large material-icons">home</i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection


