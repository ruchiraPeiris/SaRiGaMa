@extends('Teacher.index')

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
    @include('student_attendance_history_by_admin')
@endsection