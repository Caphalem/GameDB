@extends('layout.main')

@section('head')
    <title>Change profile</title>
@stop

@section('content')
   <form action="{{URL::route('profile-change-post')}}" method = "post">

        <div class="col-md-6">
            <div class="form-group input-group-sm">
                Edit username:
                @if($errors->has('new_username'))
                    {{ $errors->first('new_username')  }}
                @endif
                <input class="form-control" type="text" name="new_username" value="{{ Auth::user()->username }}">
            </div>
            <div class="form-group input-group-sm">
                Edit first name:
                @if($errors->has('new_first_name'))
                    {{ $errors->first('new_first_name')  }}
                @endif
                <input class="form-control" type="text" name="new_first_name" value="{{ Auth::user()->first_name }}">
            </div>
            <div class="form-group input-group-sm">
                Edit last name:
                @if($errors->has('new_last_name'))
                    {{ $errors->first('new_last_name')  }}
                @endif
                <input class="form-control" type="text" name="new_last_name" value="{{ Auth::user()->last_name }}">
            </div>
            <div class="form-group input-group-sm">
                Edit email:
                @if($errors->has('new_email'))
                    {{ $errors->first('new_email')  }}
                @endif
                <input class="form-control" type="text" name="new_email" value="{{ Auth::user()->email }}">
            </div>
            <input type="submit" value="Submit Changes" class="btn btn-default">
            {{Form::token()}}
        </div>

    </form>
@stop