@extends('Teacher.index')
@section('title')
    Teacher Home
@endsection

@section('content')

    <!-- Page Layout here -->

    <div class="row">
        <div class="col-sm-12;" id="left">
            <!-- Side Navigation Bar-->
            <div class="collection" id="left">
                <a href="default.asp">
                    <img src="smiley.gif" alt="HTML tutorial" style="width:42px;height:42px;border:0">
                </a>
                <a href="{{route('get_group_classes')}}" class="collection-item">Group Class</a>
                <a href="{{route('get_individual_classes')}}" class="collection-item">Individual Class</a>
                {{--<a href="#!" class="collection-item">Teacher Registration</a>--}}
                {{--<a href="#!" class="collection-item">Update Teacher Details</a>--}}
                {{--<a href="#!" class="collection-item">Teacher Payment</a>--}}
            </div>

        </div>

        {{--<div class="col 9" id="right">--}}
        {{--<!-- page content  -->--}}
        {{--<div id="right">--}}
        {{--<!--@yield('body')-->--}}
        {{--</div>--}}
        {{--</div>--}}

    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>


@endsection