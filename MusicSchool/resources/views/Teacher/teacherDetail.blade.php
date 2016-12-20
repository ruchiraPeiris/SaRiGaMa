@extends('Admin.index')

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


    <div class="row" style="padding-top: 2%;">
        <div class="col-md-12">
            <table class="table table-bordered" style="border: groove;">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Salary</th>

                </tr>

                {{--@foreach($details as $detail)--}}
                    {{--<tr>--}}
                        {{--<th>{{ $detail->id }}</th>--}}
                        {{--<th>{{ $detail->name }}</th>--}}
                        {{--<th>{{ $detail->salary }}</th>--}}

                    {{--</tr>--}}
                {{--@endforeach--}}
            </table>
        </div>
    </div>



    <div>
        <h1> Salary Details </h1>
    </div>


    <div class="row" style="padding-top: 2%;">
        <div class="col-md-12">
            <table class="table table-bordered" style="border: groove;">
                <tr>
                    <th>Date</th>
                    <th>Salary</th>

                </tr>

                {{--@foreach($details as $detail)--}}
                    {{--<tr>--}}

                        {{--<th>{{ $detail->created_at }}</th>--}}
                        {{--<th>{{ $detail->salary }}</th>--}}

                    {{--</tr>--}}
                {{--@endforeach--}}
            </table>
        </div>
    </div>

    <div class="row" style="padding-top: 2%;">
        <div class="col-md-12">
            <form action="#" method="post">

                <div class="form-group">
                    <label for="payment">Payment</label>
                    <input class="form-control" type="text" name="payment" id="payment">
                </div>



                <button type="submit" class="btn btn-primary">Confirm</button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </div>
    </div>

@endsection