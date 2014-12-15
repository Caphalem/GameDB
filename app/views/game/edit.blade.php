@extends ('layout.main')

@section('head')
    <title>Edit game</title>
@stop

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
                    <br>
                    <div class="form-group col-md-10">
                        <label for="min_os">OS</label>
                        <input type="text" class="form-control" name="min_os" value="{{ $game->minimalRequirements->os }}">
                    </div>
                    <div class="col-md-2">
                        <label for="min_system_RAM">System RAM</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="min_system_RAM" value="{{ $game->minimalRequirements->system_RAM }}">
                            <div class="input-group-addon">GB</div>
                        </div>
                    </div>
                    <div class="form-group col-md-10">
                        <label for="min_cpu">CPU</label>
                        <input type="text" class="form-control" name="min_cpu" value="{{ $game->minimalRequirements->cpu }}">
                    </div>
                    <div class="col-md-2">
                        <label for="min_hard_drive_space">Hard Drive Space</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="min_hard_drive_space" value="{{ $game->minimalRequirements->hard_drive_space }}">
                            <div class="input-group-addon">GB</div>
                        </div>
                    </div>
                    <div class="form-group col-md-10">
                        <label for="min_graphics_card">Graphics Card</label>
                        <input type="text" class="form-control" name="min_graphics_card" value="{{ $game->minimalRequirements->graphics_card }}">
                    </div>
                    <div class="col-md-2">
                        <label for="min_graphics_memory">Graphics Memory</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="min_graphics_memory" value="{{ $game->minimalRequirements->graphics_memory }}">
                            <div class="input-group-addon">GB</div>
                        </div>
                    </div>
                </td>
                <td>
                @if($errors->has('min_os'))
                    {{ $errors->first('min_os')  }}<br>
                @endif
                @if($errors->has('min_system_RAM'))
                    {{ $errors->first('min_system_RAM')  }}<br>
                @endif
                @if($errors->has('min_cpu'))
                    {{ $errors->first('min_cpu')  }}<br>
                @endif
                @if($errors->has('min_hard_drive_space'))
                    {{ $errors->first('min_hard_drive_space')  }}<br>
                @endif
                @if($errors->has('min_graphics_card'))
                    {{ $errors->first('min_graphics_card')  }}<br>
                @endif
                @if($errors->has('min_graphics_memory'))
                    {{ $errors->first('min_graphics_memory')  }}<br>
                @endif
                </td>
            </tr>
            <tr>
                <td>Recomended requirements:</td>
                <td>
                    <br>
                    <div class="form-group col-md-10">
                        <label for="os">OS</label>
                        <input type="text" class="form-control" name="os" value="{{ $game->recomendedRequirements->os }}">
                    </div>
                    <div class="col-md-2">
                        <label for="system_RAM">System RAM</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="system_RAM" value="{{ $game->recomendedRequirements->system_RAM }}">
                            <div class="input-group-addon">GB</div>
                        </div>
                    </div>
                    <div class="form-group col-md-10">
                        <label for="cpu">CPU</label>
                        <input type="text" class="form-control" name="cpu" value="{{ $game->recomendedRequirements->cpu }}">
                    </div>
                    <div class="col-md-2">
                        <label for="hard_drive_space">Hard Drive Space</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="hard_drive_space" value="{{ $game->recomendedRequirements->hard_drive_space }}">
                            <div class="input-group-addon">GB</div>
                        </div>
                    </div>
                    <div class="form-group col-md-10">
                        <label for="graphics_card">Graphics Card</label>
                        <input type="text" class="form-control" name="graphics_card" value="{{ $game->recomendedRequirements->graphics_card }}">
                    </div>
                    <div class="col-md-2">
                        <label for="graphics_memory">Graphics Memory</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="graphics_memory" value="{{ $game->recomendedRequirements->graphics_memory }}">
                            <div class="input-group-addon">GB</div>
                        </div>
                    </div>
                </td>
                <td>
                @if($errors->has('os'))
                    {{ $errors->first('os')  }}<br>
                @endif
                @if($errors->has('system_RAM'))
                    {{ $errors->first('system_RAM')  }}<br>
                @endif
                @if($errors->has('cpu'))
                    {{ $errors->first('cpu')  }}<br>
                @endif
                @if($errors->has('hard_drive_space'))
                    {{ $errors->first('hard_drive_space')  }}<br>
                @endif
                @if($errors->has('graphics_card'))
                    {{ $errors->first('graphics_card')  }}<br>
                @endif
                @if($errors->has('graphics_memory'))
                    {{ $errors->first('graphics_memory')  }}<br>
                @endif
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