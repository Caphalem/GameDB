@extends('layout.main')

@section('head')
    <title>Forgot password</title>
@stop

@section('content')
 <form action="{{URL::route('account-forgot-password-post')}}" method = "post">
  <div class="field">
           Email: <input type="text" name="email{{ (Input::old('email')) ? 'value"' .e(Input::old('email')) . '"' : '' }}">
                           @if($errors->has('email'))
                               {{ $errors->first('email') }}
                           @endif
  </div>
 <input type="submit" value="Recover password">
        {{Form::token()}}
    </form>
@stop