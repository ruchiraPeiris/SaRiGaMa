@extends('Admin.index')
@section('title')
    Edit Teacher
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
<div class="top-employeeform " style="background-color:#00838f  ; light-orange">

</div>
<div class="container " style="padding: 10px;">
    <div class="row">
        <div class="col m10 offset-m1 s12">
            <br><br>
            <div class="row">

                <form action="" method="post">
                    <div class="row">
                        <div class="input-field nom col m6 s12">
                            <input type="text" name="teacher_id" value="">
                            <label for="teacher_id">Teacher ID</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col m5">
                            <p class="right-align"><button id="search-employee-profile" class="btn btn-large waves-effect waves-light midddle" style="background-color:#00838f" type="submit" value="submit" name="search">Search Teacher Profile</button></p>
                        </div>
                    </div>
                </form>
                <form action="" method="post">
                    <div class="row">
                        <div class="input-field nom col m6 s12">
                            <input  value="" id="first_name" name="first_name" type="text" class="validate">
                            <label for="first_name">First Name</label>
                        </div>
                        <div class="input-field nom col m6 s12">
                            <input  value="" id="last_name" name="last_name" type="text" class="validate">
                            <label for="last_name">Last Name</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field nom col m12 s12">
                            <input value="" id="id-number" name="id_number" type="text" class="validate">
                            <label for="id-number">ID Number</label>
                        </div>

                    </div>

                    <div class="row">
                        <div class="input-field nom col m6 s12">
                            <input  value="" id="Tel-home" name="Tel_number" type="text" class="validate">
                            <label for="Tel-home">Tel-home</label>
                        </div>

                        <div class="input-field nom col m6 s12">
                            <input  value="" id="Tel-mobile" name="Tel_mobile" type="text" class="validate">
                            <label for="Tel-mobile">Tel-mobile</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field nom col m6 s12">
                            <input  value="" id="address" name="address" type="text" class="validate">
                            <label for="address">Qualification</label>
                        </div>
                        <div class="input-field nom col m6 s12">
                            <input type="text" id="datepicker">
                            <label for="dob">Date Of Birth</label>

                        </div>
                    </div >
                    <div class="row">
                        <div class="input-field nom col m6 s12">
                            <select multiple>
                                <option value="" disabled selected>Select Course</option>
                                <option value="1">MC-5832</option>
                                <option value="2">MC-5825</option>
                                <option value="3">MC-8325</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col m5">
                            <p class="right-align"><button id="upate-employee-profile" class="btn btn-large waves-effect waves-light midddle" style="background-color:#00838f" type="submit" value="submit" name="update">Update Teacher Profile</button></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- home button -->
    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
        <a class="btn-floating btn-large red" href="">
            <i class="extar-large material-icons">home</i>
        </a>
    </div>
</div>
@endsection