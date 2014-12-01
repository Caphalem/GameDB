@extends('layout.main')

@section('content')
    <form action="{{ URL::route('account-create-post') }}" method="post">

        <div class="col-md-6">
            <div class="form-group input-group-sm">
                Email:
                @if($errors->has('email'))
                    {{ $errors->first('email')  }}
                @endif
                <input class="form-control" type="text" name="email"{{ (Input::old('email')) ? ' value="' . e(Input::old('email')). '"': ''}}>
            </div>
            <div class="form-group input-group-sm">
                Username:
                @if($errors->has('username'))
                    {{ $errors->first('username')  }}
                @endif
                <input class="form-control" type="text" name="username"{{ (Input::old('username')) ? ' value="' . e(Input::old('username')). '"': ''}}>
            </div>
            <div class="form-group input-group-sm">
                First Name:
               @if($errors->has('first_name'))
                    {{ $errors->first('first_name')  }}
               @endif
               <input class="form-control" type="text" name="first_name"{{ (Input::old('first_name')) ? ' value="' . e(Input::old('first_name')). '"': ''}}>
            </div>
            <div class="form-group input-group-sm">
                Last Name:
                @if($errors->has('last_name'))
                    {{ $errors->first('last_name')  }}
                @endif
                <input class="form-control" type="text" name="last_name"{{ (Input::old('last_name')) ? ' value="' . e(Input::old('last_name')). '"': ''}}>
            </div>
            <div class="form-group input-group-sm">
                Password:
                @if($errors->has('password'))
                    {{ $errors->first('password')  }}
                @endif
                <input class="form-control" type="password" name="password">
            </div>
            <div class="form-group input-group-sm">
                Password again:
                @if($errors->has('password_again'))
                    {{ $errors->first('password_again')  }}
                @endif
                <input class="form-control" type="password" name="password_again">
            </div>
            <input class="btn btn-default" type="submit" value="Create account">
            {{Form::token()}}
        </div>

    </form>
@stop