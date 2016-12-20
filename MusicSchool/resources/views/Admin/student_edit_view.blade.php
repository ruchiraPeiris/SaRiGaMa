@extends('Admin.index')
@section('title')
    Update Student
@endsection

@section('style')


    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
    <link href="../../../public/css/jquery-ui.css" rel="stylesheet">
    <link href="../../../public/css/jquery-ui.min.css" rel="stylesheet">
    <script src="../../../public/js/jquery-ui.js" type="text/javascript"></script>
    <script src="../../../public/js/jquery-ui.min.js" type="text/javascript"></script>

    <script>
        $(document).ready(function () {
            $('select').material_select();
        });
        var d = new Date();
        d.setFullYear(d.getFullYear() - 100);
        $('.datepicker').pickadate(
            {
                selectMonths: true,
                selectYears: d,
                max: new Date()
            });

    </script>
@endsection
@section('content')
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



    <div class="container " style="padding: 5px;">
        <div class="row">
            <div class="col-lg-12">
                <br><br>
                {{csrf_field()}}
                <div class="card-panel teal lighten-2">
                    <h6>Edit Student Details</h6>
                </div>
                <table class="striped">
                    <thead>
                    <tr>
                        <th data-field="id">Student ID</th>
                        <th data-field="name">Student Name</th>
                        <th data-field="price">Edit</th>
                    </tr>
                    </thead>
                    @foreach ($student as $student)
                        <tr>
                            <td>{{ $student->student_id }}</td>
                            <td>{{ $student->std_first_name }}</td>
                            <td><a href='{{ route('view_student_records', $student->student_id ) }}'>Edit</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection