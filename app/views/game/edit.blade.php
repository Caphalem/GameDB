@extends ('layout.main')

@section ('content')

    <h2>Edit game information</h2>
    <form action="{{ URL::route('game-edit', $game->id) }}" method="post">

        <table>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="title" value="{{ $game->title }}" class="form-control"></td>
                <td>
                    @if($errors->has('title'))
                        {{ $errors->first('title')  }}
                    @endif
                </td>
            </tr>
            <tr>
                <td>Publisher:</td>
                <td>
                    <select name="publisher" class="form-control">
                        <option value="{{ $game->publisher->id }}">{{ $game->publisher->title }}</option>
                        @foreach($publishers as $p)
                            @if($p->id != $game->publisher->id)
                                <option value="{{ $p->id }}">{{ $p->title }}</option>
                            @endif
                        @endforeach
                    </select>
                </td>
                <td></td>
            </tr>
            <tr>
                <td>Developer:</td>
                <td>
                    <select name="developer" class="form-control">
                        <option value="{{ $game->developer->id }}">{{ $game->developer->title }}</option>
                        @foreach($developers as $d)
                            @if($d->id != $game->developer->id)
                                <option value="{{ $d->id }}">{{ $d->title }}</option>
                            @endif
                        @endforeach
                    </select>
                </td>
                <td></td>
            </tr>
            <tr>
                <td>Minimal requirements:</td>
                <td>
                    <select name="min" class="form-control">
                        <option value="{{ $game->minimalRequirements->id }}">
                            {{ $game->minimalRequirements->os }},
                            {{ $game->minimalRequirements->cpu }},
                            {{ $game->minimalRequirements->system_RAM }},
                            {{ $game->minimalRequirements->graphics_card }},
                            {{ $game->minimalRequirements->graphics_memory }},
                            {{ $game->minimalRequirements->hard_drive_space }}
                        </option>
                        @foreach($requirements as $r)
                            @if($r->id != $game->minimalRequirements->id)
                                <option value="{{ $r->id }}">
                                    {{ $r->os }},
                                    {{ $r->cpu }},
                                    {{ $r->system_RAM }},
                                    {{ $r->graphics_card }},
                                    {{ $r->graphics_memory }},
                                    {{ $r->hard_drive_space }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </td>
                <td></td>
            </tr>
            <tr>
                <td>Recomended requirements:</td>
                <td>
                    <select name="max" class="form-control">
                        <option value="{{ $game->recomendedRequirements->id }}">
                            {{ $game->recomendedRequirements->os }},
                            {{ $game->recomendedRequirements->cpu }},
                            {{ $game->recomendedRequirements->system_RAM }},
                            {{ $game->recomendedRequirements->graphics_card }},
                            {{ $game->recomendedRequirements->graphics_memory }},
                            {{ $game->recomendedRequirements->hard_drive_space }}
                        </option>
                        @foreach($requirements as $r)
                            @if($r->id != $game->recomendedRequirements->id)
                                <option value="{{ $r->id }}">
                                    {{ $r->os }},
                                    {{ $r->cpu }},
                                    {{ $r->system_RAM }},
                                    {{ $r->graphics_card }},
                                    {{ $r->graphics_memory }},
                                    {{ $r->hard_drive_space }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </td>
                <td>
                </td>
            </tr>
            <tr>
                <td>Metacritic score:</td>
                <td><input type="text" name="metacritic_score" value="{{ $game->metacritic_score }}" class="form-control"></td>
                <td>
                    @if($errors->has('metacritic_score'))
                        {{ $errors->first('metacritic_score')  }}
                    @endif
                </td>
            </tr>
            <tr>
                <td>Release date:</td>
                <td><input type="text" name="release_date" value="{{ $game->release_date }}" class="form-control"></td>
                <td>
                    @if($errors->has('release_date'))
                        {{ $errors->first('release_date')  }}
                    @endif
                </td>
            </tr>
            <tr>
                <td>Link to metacritic:</td>
                <td><input type="text" name="link_to_metacritic" value="{{ $game->link_to_metacritic }}" class="form-control"></td>
                <td>
                    @if($errors->has('link_to_metacritic'))
                        {{ $errors->first('link_to_metacritic')  }}
                    @endif
                </td>
            </tr>
            <tr>
                <td>Description:</td>
                <td><textarea class="form-control" name="description">{{ $game->description }}</textarea></td>
                <td>
                    @if($errors->has('description'))
                        {{ $errors->first('description')  }}
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="submit" value="Submit" class="btn btn-default">
                </td>
            </tr>
        </table>

    </form>

@stop