@extends ('layout.main')

@section ('content')
    @if(!$games)
<div class="page-header" style="text-align: center">
    <h1> <small>You don't have favorite games </small> </h1>
    </p></div>

    @else
<div class="page-header" style="text-align: center">
    <h1> <small>Your favorite games </small> </h1>
    </p></div>

        <ol>
            @foreach($games as $g)
                <li>{{ $g->title }} <a href="{{ URL::route('remove-fav', array(Auth::user()->id, $g->id)) }}"><img src="{{ asset('images/remove.png') }}" onclick="return confirm('Are you really want to remove {{ $g->title }} from list?')"></a></li>
            @endforeach
        </ol>
    @endif
@stop