@extends('Admin.index')
@section('title')
    Teacher Salary
@endsection
@section('content')

    <h4 style="padding: 0.3cm;">
        <button class="btn btn-default" type="button" style="float: right; ">
            <a href="#"><span class="glyphicon glyphicon-user"></span> Logout</a>
        </button>
    </h4>
    <hr>


    <div>
        <h1> Teacher Salary </h1>
    </div>



    <div class="col-sm-12;" style="padding-bottom: 10%; margin-top: 2% ">
        <div class="container"
             style="border-style: inset; padding-bottom: 5%; width: 100%; float: left; background-color: white;">
            <h2>Select teacher's name</h2>

            <form action="{{route('teacher_detail')}}" method="post">

                <div class="form-group">

                    <select class="form-control" name="teacher_id">
                        @foreach($teachers as $teacher)
                            <option value="{{$teacher->teacher_id}}">{{$teacher->t_first_name}} {{$teacher->t_last_name}}</option>
                        @endforeach
                    </select>

                </div>

                <button class="btn btn-default" type="submit">
                    Select
                </button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>


            <div class="row" style="padding-top: 2%;">
                <div class="col-md-12">

                </div>
            </div>

        </div>

    </div>


@endsection

