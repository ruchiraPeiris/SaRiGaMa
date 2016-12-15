<header>
    <h4 style="padding: 0.3cm;"><button class="btn btn-default" type="button" style="float: right; ">
            <a href="#"><span class="glyphicon glyphicon-user"></span> Logout</a>
        </button></h4>
    <hr>


    <div>
        <h1> Attendance </h1>
    </div>



    <div class="col-sm-12;" style="padding-bottom: 10%; margin-top: 2% ">
        <div class="container" style="border-style: inset; padding-bottom: 5%; width: 100%; float: left; background-color: white;">
            <h2>Mark Student Attendance </h2>

            {{--<div class="input-group">--}}
            {{--<form action="{{route('filter_course_table')}}" method="post"  type="text" class="form-control" placeholder="Search by title | instrument | location .." name="searchValue">--}}
            {{--<span class="input-group-btn">--}}
            {{--<button  type="submit" class="btn btn-default" name="search"  >--}}
            {{--<a href="{{URL::route('/check')}}"></a>--}}
            {{--<span class="glyphicon glyphicon-search"></span>--}}
            {{--</button>--}}
            {{--</span>--}}
            {{--</form>--}}
            {{--</div>--}}

            <form action="{{route('save_student_attendance')}}" method="POST" style="float: right; ">
                {!!csrf_field()!!}
                <div class="row" style="padding-top: 2%;">
                    <div class="col-md-12">
                        <table class="table table-bordered" style="border: groove;">
                            <tr>
                                <th>Index Number</th>
                                <th>Name</th>
                                <th>Present</th>
                                <th>Absent</th>
                                <th>Late</th>

                            </tr>

                            @foreach($student_name_id as $student_name_id)
                                <tr>
                                    <th>{{ $student_name_id->student_id }}</th>
                                    <th>{{ $student_name_id->student_name }}</th>
                                    <th>

                                        <div class="radio">
                                            <label><input type="radio" name="{{$student_name_id->student_id}}" value="11" id='express' ></label>
                                        </div>
                                    </th>
                                    <th>

                                        <div class="radio">
                                            <label><input type="radio" name="{{$student_name_id->student_id}}" value="00" id='express' ></label>
                                        </div>
                                    </th>
                                    <th>

                                        <div class="radio">
                                            <label><input type="radio" name="{{$student_name_id->student_id}}" value="10" id='express' ></label>
                                        </div>
                                    </th>
                                    {{--<input type="hidden" name="{{$student->student_id}}"  id='{{$student->student_id}}' >--}}
                                </tr>
                            @endforeach



                        </table>
                    </div>
                </div>
                <button type="submit" class="btn btn-default"
                        style="float:left;  color: #d9edf7; background-color: #2a88bd" value="submit">Save
                </button>
            </form>

        </div>

    </div>



</header>