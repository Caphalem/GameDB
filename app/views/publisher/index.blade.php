@extends('layout.main')

@section('head')
    <title>Publishers</title>
@stop

@section('content')
<div class="page-header" style="text-align: center">
    <h1> <small>Publisher Management </small> </h1>
    </p></div>

    <a href="{{ action('PublisherController@create') }}" class="btn btn-primary">Add New Publisher</a>

@if ($publishers->isEmpty())
There are no publishers! :(
@else
<table class="table table-striped">
    <thead>
    <tr>
        <th>Title</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
    @foreach($publishers as $publisher)
    <tr>
        <td>{{ $publisher->title }}</td>
        <td>{{ $publisher->description }}</td>
        <td>
            <a href="{{ action('PublisherController@edit', $publisher->id) }}" class="btn btn-default">Edit</a>

            <a href="{{ action('PublisherController@delete', $publisher->id) }}" class="btn btn-danger">Delete</a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
@endif
@stop