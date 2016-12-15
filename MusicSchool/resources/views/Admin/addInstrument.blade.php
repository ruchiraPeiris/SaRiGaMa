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

    {{--{{route('save_instrument')}}--}}
    <form action="{{route('save_instrument')}}" method="POST">
        {{csrf_field()}}
        <div class="form-group">
            <label for="title">Instrument ID:</label>
            <input type="text" class="form-control" name='instrument_id' id="instrument_id" placeholder="Enter instrument id">
        </div>
        <div class="form-group">
            <label for="instrument">Instrument Name :</label>
            <input type="text" class="form-control" name='instrument_name' id="instrument_name" placeholder="Enter instrument name">
        </div>
        <div class="form-group">
            <label for="fee">Category:</label>
            <input type="text" class="form-control" name="category" id="category" placeholder="Enter course category">
        </div>
        <div class="form-group">
            <label for="location">Details:</label>
            <input type="text" class="form-control" name="details" id="details" placeholder="Enter instrument details">
        </div>



        {{--<div class="checkbox">--}}
        {{--<label><input type="checkbox"> Remember me</label>--}}
        {{--</div>--}}
        <button type="submit" class="btn btn-default" style="float:left;  color: #d9edf7; background-color: #2a88bd" value="submit">Save</button>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
@endsection