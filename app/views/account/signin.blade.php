@extends('layout.main')

@section('head')
    <title>Sign in</title>
@stop

@section('content')
    <form action="{{ URL::route('account-sign-in-post') }}" method="post">

        <div class="col-md-6">
            <div class="form-group input-group-sm">
                Email:
                @if($errors->has('email'))
                    {{ $errors->first('email') }}
                @endif
                <input class="form-control" type="text" name="email" {{ (Input::old('email')) ? 'value="' . Input::old('email') . '"' : ''}}>
            </div>
            <div class="form-group input-group-sm">
                Password:
                @if($errors->has('password'))
                    {{ $errors->first('password') }}
                @endif
                <input class="form-control" type="password" name="password">
            </div>
            <div class="input-group-sm">
                Remember me
                <input type="checkbox" name="remember" id="remember">
                <label for="remember"></label>
            </div><br>
            <input class="btn btn-default" type="submit" value="Sign in">
            {{ Form::token() }}
        </div>

    </form>
@stop