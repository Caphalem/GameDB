@extends('layout.main')
@section('content')
<div class="page-header" style="text-align: center">
    <h1>Delete {{ $publisher->title }}? <small>
            <br>Do you really want to delete publisher?</small></h1>

<form action="{{ action('PublisherController@handleDelete') }}" method="post" role="form">
    <input type="hidden" name="publisher" value="{{ $publisher->id }}" />
    <input type="submit" class="btn btn-danger" value="Yes" />
    <a href="{{ action('PublisherController@index') }}" class="btn btn-default">No</a>
</form>
    </p></div>

@stop