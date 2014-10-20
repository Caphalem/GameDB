@extends('layout.main')

@section('content')
    <form action "{{ URL::route('account-create-post') }}" methiod "post">

        <input type="submit" value="Create account">
        {{ Form::token() }}
        </form>
@stop