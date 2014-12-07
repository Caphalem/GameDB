@extends('layout.main')

@section('content')
    <form action="{{URL::route('account-change-password-post')}}" method = "post">

        <div class="col-md-6">
            <div class="form-group input-group-sm">
                Current password:
                 @if($errors->has('old_password'))
                    {{ $errors->first('old_password') }}
                 @endif
                 <input class="form-control" type="password" name="old_password">
            </div>
            <div class="form-group input-group-sm">
                New password:
                @if($errors->has('password'))
                    {{ $errors->first('password') }}
                @endif
                <input class="form-control" type="password" name="password">
            </div>
            <div class="form-group input-group-sm">
                Repeat new password:
                @if($errors->has('password_again'))
                    {{ $errors->first('password_again') }}
                @endif
                <input class="form-control" type="password" name="password_again">
            </div>
            <input class="btn btn-default" type="submit" value="Change password">
            {{Form::token()}}
        </div>

    </form>

@stop