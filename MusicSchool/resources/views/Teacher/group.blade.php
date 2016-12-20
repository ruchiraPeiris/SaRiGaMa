@extends('Teacher.index')
@section('title')
    Group classes
@endsection

@section('content')

    <!-- Page Layout here -->


    <div class="row">
        <div class="col-sm-12;" id="left">
            <!-- Side Navigation Bar-->
            <div class="collection" id="left">

                    @foreach($groupClass as $groupClasses)
                        <a href="/studentAttendance/{{$groupClasses->class_module_id}}/{{$groupClasses->class_type}}" class="collection-item">{{$groupClasses->module_code}}</a>

                    @endforeach


            </div>

        </div>

    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>


@endsection