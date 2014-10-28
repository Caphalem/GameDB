@extends('layout.main')
@section('content')
<div class="page-header" style="text-align: center">
    <h1> <small>Requirements Management </small> </h1>
    </p></div>

    <a href="{{ action('RequirementsController@create') }}" class="btn btn-primary">Add New Requirements</a>
    <br>
@if ($requirements->isEmpty())
There are no requirements! :(
@else
<table class="table table-striped">
    <thead>
    <tr>
        <th>OS</th>
        <th>CPU</th>
        <th>RAM (GB)</th>
        <th>Graphics Card</th>
        <th>Graphics Memory (GB)</th>
        <th>Hard Drive Space (GB)</th>
    </tr>
    </thead>
    <tbody>
    @foreach($requirements as $requirement)
    <tr>
        <td>{{ $requirement->os }}</td>
        <td>{{ $requirement->cpu }}</td>
        <td>{{ $requirement->system_RAM }}</td>
        <td>{{ $requirement->graphics_card }}</td>
        <td>{{ $requirement->graphics_memory }}</td>
        <td>{{ $requirement->hard_drive_space }}</td>
        <td>
            <a href="{{ action('RequirementsController@edit', $requirement->id) }}" class="btn btn-default">Edit</a>

            <a href="{{ action('RequirementsController@delete', $requirement->id) }}" class="btn btn-danger">Delete</a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
@endif
@stop