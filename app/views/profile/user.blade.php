@extends('layout.main')

@section('content')
<p> Username: {{ Auth::user()->username; }} </p>
<p> First name: {{ Auth::user()->first_name; }} </p>
<p> Last name: {{ Auth::user()->last_name; }} </p>
<p> Email: {{ Auth::user()->email; }} </p>
<a href="{{ URL::route('profile-change') }}" class="btn btn-default">Edit profile information</a>
@stop