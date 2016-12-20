<header>
    {{--{{ csrf_token() }}--}}
    <h4 style="padding: 0.3cm;">
        <button class="btn btn-default" type="button" style="float: right; ">
            <a href="#"><span class="glyphicon glyphicon-user"></span> Logout</a>
        </button>
    </h4>
    <hr>


    <div>
        <h1>Class Module</h1>
    </div>

    {{--@if(count($errors)>0)--}}
    {{--<div class="row">--}}
    {{--<div class="col-lg-12">--}}
    {{--<ul>--}}
    {{--@foreach($errors->all() as $error)--}}
    {{--<li>--}}
    {{--{{$error}}--}}
    {{--</li>--}}
    {{--@endforeach--}}

    {{--</ul>--}}

    {{--</div>--}}

    {{--</div>--}}
    {{--@endif--}}

    <div class="col-sm-12" style="padding-bottom: 10%;">
        <div class="container" style="float: left;  border-style: inset; padding-bottom: 5%; background-color: white;">

            @foreach($present as $a)


            <h2>Add Class Module</h2>
            <form action="{{route('update_class_module',[$a->class_module_id])}}" method="POST">
                {{--<form action="#" method="POST">--}}
                {!!csrf_field()!!}

                {{--for module code--}}



                <div>
                    <div class="form-group" >
                        <label for="module_code">Module Code:</label>
                        <input type="text" class="form-control" name="module_code" id="module_code"
                                placeholder="{{$a->module_code}}"  value="">
                    </div>
                    <div class="form-group">
                        <select name="module_code_1" id="module_code_1">

                            @foreach($modules as $module)
                                <option value={{$module->module_code}}>{{$module->module_code}}</option>
                            @endforeach

                        </select>
                    </div>

                    <script type="text/javascript">
                        var module_code_1 = document.getElementById('module_code_1');
                        var module_code = document.getElementById('module_code');
                        module_code_1.onchange = function(){
                            module_code.value = module_code_1.value;
                        }
                    </script>
                </div>


                {{--end of module code--}}


                {{--for instrument--}}

                <div>
                    <div class="form-group" >
                        <label for="instrument">Instrument:</label>
                        <input type="text" class="form-control" name="instrument" id="instrument"
                               placeholder="{{$a->instrument_name}}"  value="">
                    </div>
                    <div class="form-group">
                        <select name="instrument_1" id="instrument_1">

                            @foreach($instruments as $instrument)
                                <option value={{$instrument->instrument_name}}>{{$instrument->instrument_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <script type="text/javascript">
                        var instrument_1 = document.getElementById('instrument_1');
                        var instrument = document.getElementById('instrument');
                        instrument_1.onchange = function(){
                            instrument.value = instrument_1.value;
                        }
                    </script>
                </div>

                {{--end of instrument--}}

                {{--for fee--}}

                <div class="form-group">
                    <label for="class_fee_per_hr">Module Fee:</label>
                    <input type="text" class="form-control" name="class_fee_per_hr" id="class_fee_per_hr"
                           placeholder="{{$a->class_fee_per_hr}}">
                </div>

                {{--end of fee--}}

                {{--for hall name--}}
                <div>
                    <div class="form-group" >
                        <label for="hall_name">Hall Name:</label>
                        <input type="text" class="form-control" name="hall_name" id="hall_name"
                               placeholder="{{$a->hall_name}}"  value="">
                    </div>
                    <div class="form-group">
                        <select name="hall_name_1" id="hall_name_1">

                            @foreach($halls as $hall)
                                <option value={{$hall->hall_name}}>{{$hall->hall_name}}</option>

                            @endforeach

                        </select>
                    </div>


                    <script type="text/javascript">
                        var hall_name_1 = document.getElementById('hall_name_1');
                        var hall_name = document.getElementById('hall_name');
                        hall_name_1.onchange = function(){

                            hall_name.value = hall_name_1.value;
                        }
                    </script>
                </div>

                {{--end of hall name--}}


                <div class="form-group">
                    <label for="num_student">Enter Number of Student:</label>
                    <input type="text" class="form-control" name="num_students" id="num_students"
                           placeholder="{{$a->num_students}}">
                </div>
                <div class="form-group">
                    <label for="teacher_fee_percentage">Enter Teacher Fee Percentage:</label>
                    <input type="text" class="form-control" name="teacher_fee_percentage" id="teacher_fee_percentage"
                           placeholder="{{$a->teacher_fee_percentage}}">
                </div>

                {{--for class type--}}

                <div>
                    <div class="form-group" >
                        <label for="class_type">Class Type:</label>
                        <input type="text" class="form-control" name="class_type" id="class_type"
                               placeholder="{{$a->class_type}}"  value="">
                    </div>
                    <div class="form-group">
                        <select name="class_type_1" id="class_type_1">

                            <option value="GROUP">Group</option>
                            <option value="INDIVIDUAL">Individual</option>

                        </select>
                    </div>

                    <script type="text/javascript">
                        var class_type_1 = document.getElementById('class_type_1');
                        var class_type = document.getElementById('class_type');
                        class_type_1.onchange = function(){
                            class_type.value = class_type_1.value;
                        }
                    </script>
                </div>

                {{--end of class type--}}

                <button type="submit" class="btn btn-default"
                        style="float:left;  color: #d9edf7; background-color: #2a88bd" value="submit">Save
                </button>



            </form>
            @endforeach


        </div>
    </div>


</header>