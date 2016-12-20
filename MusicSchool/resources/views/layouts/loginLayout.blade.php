<!-- View for inserting email and password -->

<!-- Column  2 : Sign In -->
<div class="container">
<div class="row">
<div class="col-md-4 col-md-offset-2">
    <h3>Sign In</h3>
    <form action="" method="post">
        <!--Email-->
        <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
            <label for="email" type="text" id="email">E-mail</label>
            <input class="form-control" type="text" name="email" id="email" value="{{ Request::old('email') }}"></input>
            @if($errors->has('email'))
                <span class="help-block">{{ $errors->first('email') }}</span>
            @endif
        </div>


        <!--Password-->
        <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
            <label for="password" type="text" id="password">Password</label>
            <input class="form-control" type="password" name="password" id="password"></input>
            @if($errors->has('password'))
                <span class="help-block">{{ $errors->first('password') }}</span>
            @endif
        </div>


        <!--Submit button-->
        <button type="submit" class="btn btn-primary">Submit</button>
        <input type="hidden" name="_token" value="{{ Session::token() }}">

    </form>
</div>
</div>
</div>