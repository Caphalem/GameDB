@extends('layout.main')

@section('head')
    <title>Edit developer</title>
@stop

@section('content')

<div class="page-header" style="text-align: center">
    <h1> <small>Edit Developer</small> </h1>
    </p></div>

<form action="{{ action('DeveloperController@handleEdit') }}" method="post" role="form">
    <input type="hidden" name="id" value="{{ $developer->id }}">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" value="{{ $developer->title }}" />
    </div>
    <div class="form-group">
        <label for="description">Description</label><br />
        <textarea class="form-control" rows="3"  name="description">{{ $developer->description }}</textarea>
    </div>
    <input type="submit" value="Save" class="btn btn-primary" />
    <a href="{{ action('DeveloperController@index') }}" class="btn btn-link">Cancel</a>

</form>
@stop