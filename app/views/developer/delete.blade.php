@extends('layout.main')
@section('content')
<div class="page-header" style="text-align: center">
    <h1>Delete {{ $developer->title }}? <small>
            <br>Do you really want to delete developer?</small></h1>

<form action="{{ action('DeveloperController@handleDelete') }}" method="post" role="form">
    <input type="hidden" name="developer" value="{{ $developer->id }}" />
    <input type="submit" class="btn btn-danger" value="Yes" />
    <a href="{{ action('DeveloperController@index') }}" class="btn btn-default">No</a>
</form>
    </p></div>

@stop