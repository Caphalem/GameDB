@extends('layout.main')
@section('content')
<div class="page-header" style="text-align: center">
    <h1> <small>Developer Management </small> </h1>
    </p></div>

    <a href="{{ action('DeveloperController@create') }}" class="btn btn-primary">Add New Developer</a>
    <br>
@if ($developers->isEmpty())
There are no developers! :(
@else
<table class="table table-striped">
    <thead>
    <tr>
        <th>Title</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
    @foreach($developers as $developer)
    <tr>
        <td>{{ $developer->title }}</td>
        <td>{{ $developer->description }}</td>
        <td>
            <a href="{{ action('DeveloperController@edit', $developer->id) }}" class="btn btn-default">Edit</a>

            <a href="{{ action('DeveloperController@delete', $developer->id) }}" class="btn btn-danger">Delete</a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
@endif
@stop