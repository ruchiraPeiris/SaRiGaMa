<header>

    <h4 style="padding: 0.3cm;"><button class="btn btn-default" type="button" style="float: right; ">
            <a href="#"><span class="glyphicon glyphicon-user"></span> Logout</a>
        </button></h4>
    <hr>



    <div>
        <h1>Attendance History</h1>
    </div>
    <form action="/getSelectedStudentAttendance/{{$class_module_id}}/{{$class_type}}" method="get">
        {!!csrf_field()!!}

        <div>
            <input type="date" name="date" id="date" data-date-format="mm/dd/yyyy">
        </div>

        <div>
            <input type="text" name="class_module_id" value={{$class_module_id}}>
        </div>

        <div>
            <input type="text" name="class_type" value={{$class_type}}>
        </div>
        <button type="submit" class="btn btn-default"
                style="float:left;  color: #d9edf7; background-color: #2a88bd" value="submit">Save
        </button>



    </form>


    <div class="col-sm-12;" style="padding-bottom: 10%; margin-top: 5% ">
        <div class="container"
             style="border-style: inset; padding-bottom: 5%; width: 100%; float: left; background-color: white;">
            <h2>Attendance History</h2>

            <div class="row" style="padding-top: 2%;">
                <div class="col-md-12">
                    <table class="table table-bordered" style="border: groove;">
                        <tr>
                            <th>Student Id</th>
                            <th>Student Name</th>
                            <th>Late</th>
                            <th>Present</th>
                        </tr>
                        @if($allAttendance)

                            @foreach($allAttendance as $studentAttendance)
                                <tr>
                                    <th>{{ $studentAttendance->student_id }}</th>
                                    <th>{{ $studentAttendance->student_name }}</th>
                                    <th>{{ $studentAttendance->late }}</th>   //whether absent or present
                                    <th>{{ $studentAttendance->present }}</th>
                                </tr>
                            @endforeach

                        @endif
                    </table>
                </div>
            </div>

        </div>

    </div>


</header>