@extends('layout.main')

@section('head')
    <title>My profile</title>
@stop

@section('content')
<p> Username: {{ e(Auth::user()->username); }} </p>
<p> First name: {{ e(Auth::user()->first_name); }} </p>
<p> Last name: {{ e(Auth::user()->last_name); }} </p>
<p> Email: {{ e(Auth::user()->email); }} </p>
<a href="{{ URL::route('profile-change') }}" class="btn btn-default">Edit profile information</a>
@stop