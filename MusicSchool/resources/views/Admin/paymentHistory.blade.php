@extends('Admin.index')

@section('title') Payment History
@endsection
@section('content')
    <div>
        <h1> Salary Details </h1>
    </div>


    <div class="row" style="padding-top: 2%;">
        <div class="col-md-12">
            <table class="table table-bordered" style="border: groove;">
                <tr>
                    <th> Paid Date</th>
                    <th>Student ID</th>
                    <th>Module code</th>
                    <th>Payment ID</th>
                    <th>Amount</th>

                </tr>

                @foreach($modules as $module)
                    <tr>

                        <th>{{ $module->paid_date }}</th>
                        <th>{{ $module->student_id }}</th>
                        <th>{{ $module->module_code }}</th>
                        <th>{{ $module->payment_id }}</th>
                        <th>{{ $module->paid_amt }}</th>

                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection