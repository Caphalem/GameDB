@extends('layout.main')
@section('content')

<div class="page-header" style="text-align: center">
    <h1> <small>Edit Genre</small> </h1>
    </p></div>

<form action="{{ action('GenreController@handleEdit') }}" method="post" role="form">
    <input type="hidden" name="id" value="{{ $genre->id }}">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" value="{{ $genre->title }}" />
    </div>
    <div class="form-group">
        <label for="description">Description</label><br />
        <textarea class="form-control" rows="3"  name="description">{{ $genre->description }}</textarea>
    </div>
    <input type="submit" value="Save" class="btn btn-primary" />
    <a href="{{ action('GenreController@index') }}" class="btn btn-link">Cancel</a>

</form>
@stop