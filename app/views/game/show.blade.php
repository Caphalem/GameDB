@extends('layout.main')

@section('content')
    <div class="col-md-2" style="background-color: #999999; height: 150px">The will be a picture</div>
    <div class="col-md-10 vertical-center">
        <h1>{{ $game->title }}</h1><br>
        @if(Auth::check())
            @if($fav == 0)
                Add to favorites <a href=""><img src="{{ asset('images/add.png') }}"></a>
            @elseif($fav == 1)
                Remove from favorites <a href=""><img src="{{ asset('images/remove.png') }}"></a>
            @endif
        @endif
    </div>
    <div class="col-md-12">
    <br>
    <b>Publisher: </b>{{ $game->publisher->title }}<br>
    <b>Developer: </b>{{ $game->developer->title }}<br>
    <b>Minimal requirements: </b><br>
    <b>Recomended requirements: </b><br>
    <b>Metacritic score: </b>{{ $game->metacritic_score }}<br>
    <b>User rating: </b>{{ $game->user_rating }}<br>
    <b>Release date: </b>{{ $game->release_date }}<br>
    <b>Link to metacritic: </b>{{ $game->link_to_metacritic }}<br>
    <b>Description: </b>{{ $game->description }}
    </div>
@stop