@extends('Admin.index')
@section('title')
    Teacher Allocation
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

    </script>

@endsection

@section('content')
    <div class="container " style="padding: 5px;">
        <div class="row">
            <div class="col-lg-12">
                <br><br>
                <form action="{{route('save_teacher_allocation')}}" method="POST">
                    {!!csrf_field()!!}
                    <div class="row">
                        <div class="card-panel teal lighten-2">
                            <h6>Teacher Allocation</h6>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-field nom col m12 s12">
                            <label for="teacher_id">Teacher Allocation:</label>

                            <input type="text" name="teacher_id}">
                        </div>
                        {{--<select name="teacher_id" id="teacher_id">--}}
                            {{--@foreach($teacher_ids as $teacher_id)--}}
                                {{--<option value={{$teacher_id->teacher_id}}>{{$teacher_id->teacher_id}}</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}
                    </div>

                    <div class="form-group">
                        <div class="input-field nom col m12 s12">
                            <label for="class_module_id">Class Module ID:</label>
                            <input type="text" name="class_module_id">
                        </div>
                    </div>
                    <div class="row">
                        <span>
                            <button type="submit" class="btn btn-default" name="searchValue"
                                    style="float:left;  color: #d9edf7; background-color: #2a88bd" value="submit">Save
                            </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection