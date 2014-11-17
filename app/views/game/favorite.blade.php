@extends ('layout.main')

@section ('content')
    @if(!$games)
        You don't have favorite games
    @else
        <h2>Your favotite games</h2>
        <ol>
            @foreach($games as $g)
                <li>{{ $g->title }} <a href="{{ URL::route('remove-fav', array(Auth::user()->id, $g->id)) }}"><img src="{{ asset('images/remove.png') }}" onclick="return confirm('Are you really want to remove {{ $g->title }} from list?')"></a></li>
            @endforeach
        </ol>
    @endif
@stop