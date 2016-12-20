@extends('Admin.index')
@section('title')
    Assignments
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
                    <h6>Assignments</h6>
                </div>
                <table class="striped">
                    <thead>
                    <tr>
                        <th data-field="assignment_id">Assignment ID</th>
                        <th data-field="student_id">Title</th>
                        <th data-field="price">View Marks</th>
                    </tr>
                    </thead>
                    @foreach ($assignments as $assignments)
                        <tr>
                            <td>{{ $assignments->assignment_id }}</td>
                            <td>{{ $assignments->title }}</td>
                            <td><a href='{{ route('view_assignment_marks',$class_module_id,$assignments->assignment_id ) }}'>View</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection