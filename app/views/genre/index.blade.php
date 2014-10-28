@extends('layout.main')
@section('content')
<div class="page-header" style="text-align: center">
    <h1> <small>Genre Management </small> </h1>
    </p></div>

    <a href="{{ action('GenreController@create') }}" class="btn btn-primary">Add New Genre</a>
    <br>
@if ($genres->isEmpty())
There are no genres! :(
@else
<table class="table table-striped">
    <thead>
    <tr>
        <th>Title</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
    @foreach($genres as $genre)
    <tr>
        <td>{{ $genre->title }}</td>
        <td>{{ $genre->description }}</td>
        <td>
            <a href="{{ action('GenreController@edit', $genre->id) }}" class="btn btn-default">Edit</a>

            <a href="{{ action('GenreController@delete', $genre->id) }}" class="btn btn-danger">Delete</a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
@endif
@stop