@extends('Admin.index')
@section('title')
    Add Siblings
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

    <form action="{{route('save_siblings')}}" method="POST">
        {!!csrf_field()!!}


        <div class="container " style="padding: 5px;">
            <div class="row">
                <div class="col-lg-12">
                    <br><br>
                    <div class="row">

                        <div class="card-panel teal lighten-2">
                            <h6>Add Siblings</h6>
                        </div>

                        <div class="row">
                            <div class="input-field nom col m12 s12">
                                <input type="text" name="student_id" class="validate" required="" aria-required="true">
                                <label for="student_id">Student ID</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="sibling_id">Siblings ID:</label>
                            <select name="sibling_id" id="sibling_id">

                                @foreach($siblings as $siblings)
                                    <option value={{$siblings->student_id}}>{{$siblings->student_id}}</option>
                                @endforeach

                            </select>

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