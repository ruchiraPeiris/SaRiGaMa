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

    <header>
        {{ csrf_token() }}
        <h4 style="padding: 0.3cm;">
            <button class="btn btn-default" type="button" style="float: right; ">
                <a href="#"><span class="glyphicon glyphicon-user"></span> Logout</a>
            </button>
        </h4>
        <hr>


        <div>
            <h1>Module</h1>
        </div>

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

        <div class="col-sm-12" style="padding-bottom: 10%;">
            <div class="container"
                 style="float: left;  border-style: inset; padding-bottom: 5%; background-color: white;">


                <h2>Add Module</h2>
                <form action="{{route('save_module')}}" method="POST">
                    {!!csrf_field()!!}
                    <div class="form-group">
                        <label for="title">Module Code:</label>
                        <input type="text" class="form-control" name='module_code' id="module_code"
                               placeholder="Enter module code">
                    </div>
                    {{--<div class="form-group">--}}
                        {{--<label for="instrument">Instrument ID:</label>--}}
                        {{--<input type="text" class="form-control" name='instrument_id' id="instrument_id"--}}
                               {{--placeholder="Enter instrument id">--}}
                    {{--</div>--}}

                    <div class="form-group">
                        <label for="instrument_id">Instrument ID:</label>
                        <select name="instrument_id" id="instrument_id">

                            @foreach($instruments as $instrument)
                                <option value={{$instrument->instrument_id}}>{{$instrument->instrument_id}}</option>
                            @endforeach

                        </select>

                    </div>

                    <button type="submit" class="btn btn-default" style="float:left;  color: #d9edf7; background-color: #2a88bd" value="submit">Save</button>

                    {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                </form>


            </div>
        </div>


        {{--<div class="col-sm-12;" style="padding-bottom: 10%; margin-top: 60% ">--}}
            {{--<div class="container"--}}
                 {{--style="border-style: inset; padding-bottom: 5%; width: 100%; float: left; background-color: white;">--}}
                {{--<h2>All Modules</h2>--}}

                {{--<div class="input-group">--}}
                    {{--<form action="{{route('search_course')}}" method="post" type="text" class="form-control"--}}
                          {{--placeholder="Search by title | instrument | location .." name="searchValue">--}}
                    {{--<span class="input-group-btn">--}}
                        {{--<button type="submit" class="btn btn-default" name="search">--}}
                            {{--<span class="glyphicon glyphicon-search"></span>--}}
                        {{--</button>--}}
                    {{--</span>--}}
                        {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                    {{--</form>--}}
                {{--</div>--}}


                {{--<div class="row" style="padding-top: 2%;">--}}
                    {{--<div class="col-md-12">--}}
                        {{--<table class="table table-bordered" style="border: groove;">--}}
                            {{--<tr>--}}
                                {{--<th>Module</th>--}}
                                {{--<th>Module ID</th>--}}
                            {{--</tr>--}}

                            {{--@foreach($courses as $course)--}}
                                {{--<tr>--}}
                                    {{--<th>{{ $course->name }}</th>--}}
                                    {{--<th>{{ $course->module_code }}</th>--}}

                                {{--</tr>--}}
                            {{--@endforeach--}}
                        {{--</table>--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--</div>--}}

        {{--</div>--}}

    </header>
@endsection