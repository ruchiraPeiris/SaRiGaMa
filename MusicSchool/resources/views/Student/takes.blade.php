@extends('Admin.index')




@section('style')

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/i18n/defaults-*.min.js"></script>

    <style>
        .form-control {
            /*padding-right: 150px;*/
            width: 80%;
        }
        .container {

            width: 80%;
        }

    </style>




@endsection

@section('content')

    <form action="{{route('save_student_take')}}" method="POST">
        {{csrf_field()}}
        <div class="form-group">
            <label for="title">Student Id:</label>
            <input type="text" class="form-control" name='student_id' id="student_id" placeholder="Enter student id">
        </div>
        <script>
            $('.selectpicker').selectpicker({
                style: 'btn-info',
                size: 4
            });

        </script>

        <div class="form-group">
            <label for="class_module_id">Module Code:</label>
            <select name="class_module_id" id="class_module_id">
            {{--<select class="selectpicker" name="module_code" id="module_code" multiple >--}}

                @foreach($modules as $module)
                    <option value="{{$module->class_module_id }}">{{$module->class_module_id}}  {{$module->module_code}}  {{$module->instrument_name}}  {{$module->class_type}}</option>
                @endforeach

            </select>

        </div>

        <button type="submit" class="btn btn-default" style="float:left;  color: #d9edf7; background-color: #2a88bd" value="submit">Save</button>
        {{--<input type="hidden" name="_token" value="{{Session::token()}}">--}}
        {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
    </form>

@endsection