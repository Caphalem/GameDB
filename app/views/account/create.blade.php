@extends('layout.main')

@section('content')
    <form action="{{ URL::route('account-create-post') }}" method="post">

        <div class="field">
            Email: <input type="text" name="email"{{ (Input::old('email')) ? ' value="' . e(Input::old('email')). '"': ''}}>
            @if($errors->has('email'))
                {{ $errors->first('email')  }}
            @endif
        </div>

        <div class="field">
            Username: <input type="text" name="username"{{ (Input::old('username')) ? ' value="' . e(Input::old('username')). '"': ''}}>
            @if($errors->has('username'))
            {{ $errors->first('username')  }}
            @endif
        </div>

        <div class="field">
            First Name: <input type="text" name="first_name"{{ (Input::old('first_name')) ? ' value="' . e(Input::old('first_name')). '"': ''}}>
            @if($errors->has('first_name'))
            {{ $errors->first('first_name')  }}
            @endif
        </div>

        <div class="field">
            Last Name: <input type="text" name="last_name"{{ (Input::old('last_name')) ? ' value="' . e(Input::old('last_name')). '"': ''}}>
            @if($errors->has('last_name'))
            {{ $errors->first('last_name')  }}
            @endif
        </div>



        <div class="field">
            Password: <input type="password" name="password">
            @if($errors->has('password'))
            {{ $errors->first('password')  }}
            @endif
        </div>

        <div class="field">
            Password again: <input type="password" name="password_again">
            @if($errors->has('password_again'))
            {{ $errors->first('password_again')  }}
            @endif
        </div>

        <input type="submit" value="Create account">
        {{ Form::token() }}
        </form>
@stop