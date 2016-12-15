<header>

    <h4 style="padding: 0.3cm;"><button class="btn btn-default" type="button" style="float: right; ">
            <a href="#"><span class="glyphicon glyphicon-user"></span> Logout</a>
        </button></h4>
    <hr>



    <div>
        <h1>Attendance History</h1>
    </div>


    <div class="col-sm-12;" style="padding-bottom: 10%; margin-top: 5% ">
        <div class="container"
             style="border-style: inset; padding-bottom: 5%; width: 100%; float: left; background-color: white;">
            <h2>Attendance History</h2>

            <div class="input-group">
                <form action="{{route('search_student_attendance')}}" method="POST" style="float: right; ">
                    {!!csrf_field()!!}
                    <div class="form-group" style="float: right; ">
                        <span>
                            <button type="submit" class="btn btn-default" name="searchValue"
                                    style="float:left;  color: #d9edf7; background-color: #2a88bd" value="submit">Search
                            </button>
                        </span>
                        <span>
                            <input type="text" class="form-horizontal" name="searchValue" id="searchValue"
                                   placeholder="Enter searchValue">
                        </span>

                    </div>
                </form>

            </div>


            <div class="row" style="padding-top: 2%;">
                <div class="col-md-12">
                    <table class="table table-bordered" style="border: groove;">
                        <tr>
                            <th>Student Id</th>
                            <th>Student Name</th>
                            <th>Module ID</th>
                            <th>Module</th>
                            <th>Date</th>
                            <th>Month</th>
                            <th>Year</th>
                            <th>Attendance</th>
                            {{--<th>Comments</th>--}}

                        </tr>

                        @foreach($studentAttendance as $studentAttendance)
                            <tr>
                                <th>{{ $studentAttendance->student_id }}</th>
                                <th>{{ $studentAttendance->student_full_name }}</th>
                                <th>{{ $studentAttendance->module_code }}</th>
                                <th>{{ $studentAttendance->module }}</th>    //combination if both module code and class type
                                <th>{{ $studentAttendance->date }}</th>
                                <th>{{ $studentAttendance->month }}</th>
                                <th>{{ $studentAttendance->year }}</th>
                                <th>{{ $studentAttendance->Attendance }}</th>   //whether absent or present
                            </tr>

                        @endforeach
                    </table>
                </div>
            </div>

        </div>

    </div>


</header>