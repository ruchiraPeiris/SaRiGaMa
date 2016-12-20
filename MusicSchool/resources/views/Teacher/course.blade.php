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


@endsection

@section('content')

    @include('Course.course')
@endsection