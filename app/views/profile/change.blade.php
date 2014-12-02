@extends('layout.main')

@section('content')
   <form action="{{URL::route('profile-change-post')}}" method = "post">

         <div class="field">
               New username: <input type="text" name="new_username">
                @if($errors->has('new_username'))
                        {{ $errors->first('new_username') }}
                @endif
         </div>

         <div class="field">
               New first name: <input type="text" name="new_first_name">
                               @if($errors->has('new_first_name'))
                                       {{ $errors->first('new_first_name') }}
                               @endif
         </div>

         <div class="field">
                New last name: <input type="text" name="new_last_name">
                                               @if($errors->has('new_last_name'))
                                                       {{ $errors->first('new_last_name') }}
                                               @endif
         </div>

         <div class="field">
                New email: <input type="text" name="new_email">
                   @if($errors->has('new_email'))
                           {{ $errors->first('new_email') }}
                   @endif
         </div>

   <input type="submit" value="Submit Changes">
       {{Form::token()}}
    </form>
@stop