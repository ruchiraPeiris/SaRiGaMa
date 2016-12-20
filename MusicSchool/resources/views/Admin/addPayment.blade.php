@extends('Admin.index')
@section('title')
    Add Payment
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
            <h1>Add Payment</h1>
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


                <h2>Add Payment</h2>
                {{--                <form action="{{route('save_course')}}" method="POST">--}}
                <form action="{{route('save_payment')}}" method="POST">
                    {{csrf_field()}}
                    {{--<div class="form-group">--}}
                        {{--<label for="title">Payment ID:</label>--}}
                        {{--<input type="text" class="form-control" name='payment_id' id="payment_id"--}}
                               {{--placeholder="Enter payment id">--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--<label for="instrument">Paid Date:</label>--}}
                        {{--<input type="text" class="form-control" name='paid_date' id="paid_date"--}}
                               {{--placeholder="Enter paid date">--}}
                    {{--</div>--}}
                    <div class="form-group">
                        <label for="fee">Paid Amount:</label>
                        <input type="text" class="form-control" name="paid_amt" id="paid_amt"
                               placeholder="Enter paid amount">
                    </div>
                    <div class="form-group">
                        <label for="location">Module : </label>
                        <select  name="takes_id">
                            @foreach($modules as $module)

                                <option value={{$module->takes_id}}>{{$module->module_code}}</option>

                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default"
                            style="float:left;  color: #d9edf7; background-color: #2a88bd" value="submit">Save
                    </button>
                    <input type="hidden" name="_token" value="{{Session::token()}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>


            </div>
        </div>
    </header>
@endsection