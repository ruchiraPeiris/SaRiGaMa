@extends('Teacher.index')


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

    <script>
        window.onload = function() {

            document.getElementById("date").innerHTML=today;
        }

        $( document ).ready(function(attendance) {

            document.getElementById("attendance").value = attendance;

        });
    </script>



@endsection

@section('content')

    @include('Student.markStudentAttendance')
@endsection