@extends('layout.main'))

@section('content')
<p> Username: {{ Auth::user()->username; }} </p>
<p> First name: {{ Auth::user()->first_name; }} </p>
<p> Last name: {{ Auth::user()->last_name; }} </p>
<p> Email: {{ Auth::user()->email; }} </p>
@stop