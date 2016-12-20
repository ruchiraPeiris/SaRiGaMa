@extends('Admin.index')


@section('style')
    <style>
        .form-control {
            /*padding-right: 150px;*/
            width: 80%;
        }
        .container {

            width: 80%;
        }

    </style>


@endsection

@section('content')

    <form action="{{route('save_hall')}}" method="POST">
        {{csrf_field()}}
        <div class="form-group">
            <label for="title">Hall Name:</label>
            <input type="text" class="form-control" name='hall_name' id="hall_name" placeholder="Enter hall id">
        </div>
        <div class="form-group">
            <label for="instrument">capacity:</label>
            <input type="text" class="form-control" name='capacity' id="capacity" placeholder="Enter instrument name">
        </div>
        <div class="form-group">
            <label for="fee">Building Name:</label>
            <input type="text" class="form-control" name="building_name" id="building_name" placeholder="Enter course category">
        </div>




        {{--<div class="checkbox">--}}
        {{--<label><input type="checkbox"> Remember me</label>--}}
        {{--</div>--}}
        <button type="submit" class="btn btn-default" style="float:left;  color: #d9edf7; background-color: #2a88bd" value="submit">Save</button>
        <input type="hidden" name="_token" value="{{Session::token()}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>

    @endsection