@extends ('layout.main')
@section ('content')
<ul class="list-unstyled">
 @foreach ($games as $game)
      <li><a href="{{ URL::to('game/show/' . $game->id) }}">{{ $game->title }}</a></li>
 @endforeach
</ul>
@stop