@extends('Admin.index')
@section('title')
    Add Assignment
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
                <form action="/saveAssignment/{{$class_module_id}}" method="POST">
                    {!!csrf_field()!!}

                    <div class="row">
                        <div class="card-panel teal lighten-2">
                            <h6>Add Assignment</h6>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field nom col m12 s12">
                            <label for="assignment_id">Assignment ID:</label>
                            <input type="text" name="assignment_id" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field nom col m12 s12">
                            <label for="class_module_id">Class Module ID:</label>
                            <input type="text" name="class_module_id" value="{{$class_module_id}}">
                        </div>
                    </div>
                    <div class="title">
                        <div class="input-field nom col m12 s12">
                            <label for="title">Title:</label>
                            <input type="text" name="title">
                        </div>
                    </div>
                    <div class="row">
                    <span>
                            <button type="submit" class="btn btn-default" name="saveValue"
                                    style="float:left;  color: #d9edf7; background-color: #2a88bd" value="submit">Save
                            </button>
                        </span>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection