@extends('layout.main')

@section('head')
<title>Edit Review</title>
@stop

@section('content')
@if(Auth::check())
@if(Auth::user()->role == 2)
<div class="page-header" style="text-align: center">
    <h1> <small>Edit Review</small> </h1>
    </p></div>

<form action="{{ action('GameController@handleReviewEdit') }}" method="post" role="form">
    <input type="hidden" name="rid" value="{{ $review->id }}">
    <input type="hidden" name="gid" value="{{ $game->id }}">
    {{ Form::token() }}

    <div class="form-group col-md-12">
        <label for="description">Content</label><br/>
        <textarea class="form-control" rows="3" name="content">{{ $review->content }}</textarea>
    </div>

    <input type="submit" value="Save" class="btn btn-primary" />
    <a href="{{ URL::to('game/show/'. $game->id) }}" class="btn btn-link">Cancel</a>

</form>
@else
<h1>
    <small>Do not have permissions</small>
</h1>
@endif
@else
<h1>
    <small>Please log in</small>
</h1>
@endif
@stop
