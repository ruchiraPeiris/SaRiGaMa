<header>

    <h4 style="padding: 0.3cm;"><button class="btn btn-default" type="button" style="float: right; ">
            <a href="#"><span class="glyphicon glyphicon-user"></span> Logout</a>
        </button></h4>
    <hr>



    <div>
        <h1>All Modules</h1>
    </div>


    <div class="col-sm-12;" style="padding-bottom: 10%; margin-top: 5% ">
        <div class="container"
             style="border-style: inset; padding-bottom: 5%; width: 100%; float: left; background-color: white;">
            <h2>All Modules</h2>

            <div class="input-group">
                <form action="{{route('search_class_module_in_view')}}" method="POST" style="float: right; ">
                    {!!csrf_field()!!}
                    <div class="form-group" style="float: right; ">
                        <span>
                            <button type="submit" class="btn btn-default" name="searchValue"
                                    style="float:left;  color: #d9edf7; background-color: #2a88bd" value="submit">Search
                            </button>
                        </span>
                        <span>
                            <input type="text" class="form-horizontal" name="searchValue" id="searchValue"
                                   placeholder="Enter searchValue">
                        </span>

                    </div>
                </form>

                {{--<form action="{{route('search_class_module')}}" method="POST" type="text" class="form-control">--}}
                {{--<label for="class_module_id">Enter Module Id:</label>--}}
                {{--<input type="text" class="form-control" name="searchValue" id="searchValue"--}}
                {{--placeholder="Search by title | instrument | location .." >--}}
                {{--<span class="input-group-btn">--}}
                {{--<button type="submit" class="btn btn-default" name="searchValue">--}}
                {{--<a href="{{URL::route('/check')}}"></a>--}}
                {{--<span class="glyphicon glyphicon-search"></span>--}}
                {{--</button>--}}
                {{--</span>--}}
                {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                {{--</form>--}}
            </div>


            <div class="row" style="padding-top: 2%;">
                <div class="col-md-12">
                    <table class="table table-bordered" style="border: groove;">
                        <tr>
                            <th>Module ID</th>
                            <th>Module Code</th>
                            <th>Instrument</th>
                            <th>Hall Name</th>
                            <th>Module Fee</th>
                            <th>Number of Students</th>
                            <th>Teacher Fee Percentage</th>
                            <th>Class Type</th>

                        </tr>

                        @foreach($classModule as $classModule)
                            <tr>
                                <th>{{ $classModule->class_module_id }}</th>
                                <th>{{ $classModule->module_code }}</th>
                                <th>{{ $classModule->instrument_name }}</th>
                                <th>{{ $classModule->hall_name }}</th>
                                <th>{{ $classModule->monthly_class_fee }}</th>
                                <th>{{ $classModule->num_students }}</th>
                                <th>{{ $classModule->teacher_fee_percentage }}</th>
                                <th>{{ $classModule->class_type }}</th>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>

        </div>

    </div>


</header>