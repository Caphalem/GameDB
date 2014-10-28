@extends('layout.main')
@section('content')
<div class="page-header" style="text-align: center">
    <h1>Delete {{ $genre->title }}? <small>
            <br>Do you really want to delete genre?</small></h1>

<form action="{{ action('GenreController@handleDelete') }}" method="post" role="form">
    <input type="hidden" name="genre" value="{{ $genre->id }}" />
    <input type="submit" class="btn btn-danger" value="Yes" />
    <a href="{{ action('GenreController@index') }}" class="btn btn-default">No</a>
</form>
    </p></div>

@stop