@extends ('layout.main')
@section ('content')

    @if ($games->isEmpty())
         <p class="navbar-brand">No games found!</p>
    @else
      <p hidden>{{ Form::text('query', $query, array('class' => 'form-control')) }}</p>

      <div class="row">
        <div class="col-xs-2">
            <p class="navbar-brand"></p>
        </div>
        <div class="col-xs-2">
            {{ Form::open(array('route' => 'byTitle')) }}
            <p hidden>{{ Form::text('t', $t, array('class' => 'form-control')) }}</p>
            <p hidden>{{ Form::text('r', $r, array('class' => 'form-control')) }}</p>
            <p hidden>{{ Form::text('p', $r, array('class' => 'form-control')) }}</p>
            {{ Form::submit('Title', array('class' => 'btn btn-default btn-lg')) }}
            {{ Form::close() }}
            {{--<a href="{{ action('HomeController@orderByTitle', $query) }}" class="btn btn-default btn-lg">Title</a>--}}
        </div>
        <div class="col-xs-2">
            {{--{{ Form::open(array('route' => 'byPublisher')) }}--}}
            {{--<p hidden>{{ Form::text('t', $t, array('class' => 'form-control')) }}</p>--}}
            {{--<p hidden>{{ Form::text('r', $r, array('class' => 'form-control')) }}</p>--}}
            {{--<p hidden>{{ Form::text('p', $r, array('class' => 'form-control')) }}</p>--}}
            {{--{{ Form::submit('Publisher', array('class' => 'btn btn-default btn-lg')) }}--}}
            {{--{{ Form::close() }}--}}
            <a href="{{ action('HomeController@home') }}" class="btn btn-default btn-lg">Publisher</a>
        </div>
        <div class="col-xs-2">
            <a href="{{ action('HomeController@home') }}" class="btn btn-default btn-lg">Developer</a>
        </div>
        <div class="col-xs-2">
            {{ Form::open(array('route' => 'byRelease')) }}
            <p hidden>{{ Form::text('t', $t, array('class' => 'form-control')) }}</p>
            <p hidden>{{ Form::text('r', $r, array('class' => 'form-control')) }}</p>
            <p hidden>{{ Form::text('p', $r, array('class' => 'form-control')) }}</p>
            {{ Form::submit('Release Date', array('class' => 'btn btn-default btn-lg')) }}
            {{ Form::close() }}
            {{--<a href="{{ action('HomeController@home') }}" class="btn btn-default btn-lg">Release date</a>--}}
        </div>
      </div>
     @foreach ($games as $game)
         <p hidden>{{ $publisher = Publisher::find($game->publisher_id) }} </p>
         <p hidden>{{ $developer = Developer::find($game->developer_id) }} </p>
          <div class="row">
            <div class="col-xs-2">
                <a href="{{ URL::to('game/show/' . $game->id) }}" class="thumbnail">
                    <img class="img-responsive" src="/public/images/box_art/{{ $game->box_art }}" >
                </a>
            </div>
            <div class="col-xs-2">
                <a href="{{ URL::to('game/show/' . $game->id) }}" class="navbar-brand">{{ $game->title }}</a>
            </div>
            <div class="col-xs-2">
                <a href="{{ URL::to('publisher/') }}" class="navbar-brand">{{ $publisher->title }}</a>
            </div>
            <div class="col-xs-2">
                <a href="{{ URL::to('developer/') }}" class="navbar-brand">{{ $developer->title }}</a>
            </div>
            <div class="col-xs-2">
                <p class="navbar-brand">{{ $game->release_date }}</p>
            </div>
          </div>
     @endforeach
    @endif

@stop