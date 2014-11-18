@extends ('layout.main')

@section ('content')

    <h2>Edit game information</h2>
    <form action="{{ URL::route('game-edit', $game->id) }}" method="post">

        <table>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="title" value="{{ $game->title }}"></td>
                <td>
                    @if($errors->has('title'))
                        {{ $errors->first('title')  }}
                    @endif
                </td>
            </tr>
            <tr>
                <td>Publisher:</td>
                <td></td>
                <td>

                </td>
            </tr>
            <tr>
                <td>Developer:</td>
                <td></td>
                <td>

                </td>
            </tr>
            <tr>
                <td>Minimal requirements:</td>
                <td></td>
                <td>
                </td>
            </tr>
            <tr>
                <td>Recomended requirements:</td>
                <td></td>
                <td>
                </td>
            </tr>
            <tr>
                <td>Metacritic score:</td>
                <td><input type="text" name="metacritic_score" value="{{ $game->metacritic_score }}"></td>
                <td>
                    @if($errors->has('metacritic_score'))
                        {{ $errors->first('metacritic_score')  }}
                    @endif
                </td>
            </tr>
            <tr>
                <td>Release date:</td>
                <td><input type="text" name="release_date" value="{{ $game->release_date }}"></td>
                <td>
                    @if($errors->has('release_date'))
                        {{ $errors->first('release_date')  }}
                    @endif
                </td>
            </tr>
            <tr>
                <td>Link to metacritic:</td>
                <td><input type="text" name="link_to_metacritic" value="{{ $game->link_to_metacritic }}"></td>
                <td>
                    @if($errors->has('link_to_metacritic'))
                        {{ $errors->first('link_to_metacritic')  }}
                    @endif
                </td>
            </tr>
            <tr>
                <td>Description:</td>
                <td><textarea name="description">{{ $game->description }}</textarea></td>
                <td>
                    @if($errors->has('description'))
                        {{ $errors->first('description')  }}
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="submit" value="Submit">
                </td>
            </tr>
        </table>

    </form>

@stop