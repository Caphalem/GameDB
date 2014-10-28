@extends('layout.main')
@section('content')
<div class="page-header" style="text-align: center">
    <h1> <small>Do you really want to delete requirements?</small></h1>

<form action="{{ action('RequirementsController@handleDelete') }}" method="post" role="form">
    <input type="hidden" name="requirement" value="{{ $requirement->id }}" />
    <input type="submit" class="btn btn-danger" value="Yes" />
    <a href="{{ action('RequirementsController@index') }}" class="btn btn-default">No</a>
</form>
    </p></div>

@stop