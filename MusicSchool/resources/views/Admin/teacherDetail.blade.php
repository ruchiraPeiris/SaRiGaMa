@extends('Admin.index')
@section("title")
    Teacher Details
@endsection
@section('content')
    <h4 style="padding: 0.3cm;">
        <button class="btn btn-default" type="button" style="float: right; ">
            <a href="#"><span class="glyphicon glyphicon-user"></span> Logout</a>
        </button>
    </h4>
    <hr>


    <div>
        <h1> Teacher Detail </h1>
    </div>


    <div class="row" style="padding-top: 2%;">
        <div class="col-md-12">
            <table class="table table-bordered" style="border: groove;">
                <tr>
                    <th>ID</th>
                    <th>Fist Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Date of Birth</th>
                    <th>Qualifications</th>

                </tr>

                @foreach($teacher as $teach)
                    <tr>
                        <th>{{ $teach->teacher_id }}</th>
                        <th>{{ $teach->t_first_name }}</th>
                        <th>{{ $teach->t_middle_name }}</th>
                        <th>{{ $teach->t_last_name }}</th>
                        <th>{{ $teach->t_dob }}</th>
                        <th>{{ $teach->qualifications }}</th>

                    </tr>
                @endforeach
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
                    <th>Payment ID</th>
                    <th>Amount</th>
                    <th>Date</th>

                </tr>

                @foreach($salaries as $salary)
                    <tr>

                        <th>{{ $salary->t_payment_id }}</th>
                        <th>{{ $salary->amt }}</th>
                        <th>{{ $salary->paid_date }}</th>

                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <div class="row" style="padding-top: 2%;">
        <div class="col-md-12">
            <form action="{{route('save_salary')}}" method="post">

                <div class="form-group">
                    <input class="hidden" type="text" name="teacher_id" id="teacher_id" value="{{$teacher[0]->teacher_id}}">


                </div>
                {{--<div class="form-group">--}}
                    {{--<label for="payment">Payment</label>--}}
                    {{----}}
                {{--</div>--}}

                <button type="submit" class="btn btn-primary">Pay now </button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
        </div>
    </div>

@endsection