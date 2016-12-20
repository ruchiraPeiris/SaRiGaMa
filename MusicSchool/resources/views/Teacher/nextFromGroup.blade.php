@extends('Teacher.index')
@section('title')
    Group classes
@endsection

@section('style')

    <script type="text/javascript">
        $(document).ready(function(){

            $('#date_1').change(function(){
                console.log(document.getElementById("date_1").value);
            });
        });

    </script>


@endsection


@section('content')

    <!-- Page Layout here -->

    <div class="row">
        <div class="col-sm-12;" id="left">
            <!-- Side Navigation Bar-->
            <div class="collection" id="left">
                {{--<input type="date" name="date_1" id="date_1" data-date-format="mm/dd/yyyy">--}}

                {{--@foreach($groupClass as $groupClass)--}}
                    {{--<a href="" class="collection-item">{{$groupClass->module_code}}</a>--}}


                <a href="/studentAttendanceHistory/{{$class_module_id}}/{{$class_type}}">View Student Attendance History</a>
                <a href="/markStudentAttendance/{{$class_module_id}}/{{$class_type}}">Mark Student Attendance</a>
                <a href="/addAssignment/{{$class_module_id}}/{{$class_type}}">Add assignment</a>
                <a href="/viewStudentsMarks/{{$class_module_id}}/{{$class_type}}">View Marks</a>
                <a href="/saveAssignmentAllocation/{{$class_module_id}}/{{$class_type}}">Add Marks</a>




                {{--                <a href="/studentAttendanceHistory/{{$class}}">View Student Attendance History</a>--}}
                {{--@endforeach--}}
                {{--$classModuleId, $classType, $attendDate--}}


            </div>

        </div>

    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>


@endsection