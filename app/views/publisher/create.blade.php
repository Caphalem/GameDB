@extends('layout.main')
@section('content')
<div class="page-header" style="text-align: center">
    <h1> <small>Add New Publisher </small> </h1>
    </p></div>
@if ( $errors->count() > 0 )
<div class="alert alert-danger">
    <ul>
        @foreach( $errors->all() as $global )</p>
        <li>{{ $global }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ action('PublisherController@handleCreate') }}" method="post" role="form" >
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" />
    </div>
    <div class="form-group">
        <label for="description">Description</label><br />
        <textarea class="form-control" rows="3"  name="description"></textarea>
    </div>
    <input type="submit" value="Add" class="btn btn-primary" />
    <a href="{{ action('PublisherController@index') }}" class="btn btn-link">Cancel</a>
</form>
@stop