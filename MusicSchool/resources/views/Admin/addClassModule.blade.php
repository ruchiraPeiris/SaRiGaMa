@extends('Admin.index')


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
@section('title')
    Add Class Module
    @endsection
@section('content')

    @include('Course.addClassModule')
@endsection