@extends ('layout.main')

@section('head')
    <title>Add new game</title>
@stop

@section ('content')
    <div class="col-md-12">
    {{ Form::open(array('route' => 'game.store', 'files' => true)) }}

    {{--title--}}
    <div class="form-group col-md-6">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title"/>
    </div>

    {{--publisher--}}
    <div class="form-group col-md-3">
        <label for="publisher">Publisher</label>
         <div class="input-group">
        {{ Form::select('publishers', $publishers, null, array('class'=>'form-control','style'=>'' )) }}
         <div class="input-group-btn"><a href="{{ action('PublisherController@create') }}" class="btn btn-default">Add</a></div>
        </div>
    </div>

    {{--developer--}}
    <div class="form-group col-md-3">
        <label for="developer">Developer</label>
        <div class="input-group">
            {{ Form::select('developers', $developers, null, array('class'=>'form-control','style'=>'' )) }}
            <div class="input-group-btn"><a href="{{ action('DeveloperController@create') }}" class="btn btn-default">Add</a></div>
        </div>
    </div>
    <br>

    {{--release date--}}
    <div class="col-md-8">
        <label for="release_date pull-left">Release Date</label>
    </div>
    <div class="col-md-4">
        <label for="box_art">Box Art</label>
    </div>

    <div class="form-group col-md-2">
                <div class="input-group">
                    {{ Form::select('day', $days, '1', array('class'=>'form-control','style'=>'' ))}}
                    <div class="input-group-addon left">Day</div>
                </div>
                </div>


                <div class="form-group col-md-3">
                <div class="input-group">
                    {{ Form::select('month', $months, '1', array('class'=>'form-control','style'=>'' ))}}

                    <div class="input-group-addon left">Month</div>
                </div>
                </div>

                <div class="form-group col-md-3">
                <div class="input-group">
                    {{ Form::select('year', $years, '1', array('class'=>'form-control','style'=>'' ))}}

                    <div class="input-group-addon left">Year</div>
                </div>
                </div>

                {{--box art--}}
                <div class="form-group col-md-4">

                    {{ Form::file('box_art') }}
                </div>

        {{--metacritic link--}}
        <div class="form-group col-md-9">
            <label for="metacritic_link">Link to metacritic</label>
            <input type="text" class="form-control" name="metacritic_link"/>
        </div>

    {{--metacritic score--}}
    <div class="form-group col-md-3">
        <label for="metacritic_rating">Metacritic rating</label>

        {{ Form::selectRange('metacritic_rating', 1, 100, null, array('class'=>'form-control','style'=>'' )) }}

    </div>

    {{--description--}}
    <div class="form-group col-md-12">
        <label for="description">Description</label><br/>
        <textarea class="form-control" rows="3" name="description"></textarea>
    </div>

{{--minimal requirements--}}
    <div class="row">Minimal requirements:</div>
        <div class="form-group col-md-10">
            <label for="m_os">OS</label>
            <input type="text" class="form-control" name="m_os"/>
        </div>
        <div class="col-md-2">
            <label for="m_system_RAM">System RAM</label>
            <div class="input-group">
                <input type="text" class="form-control" name="m_system_RAM"/>
                <div class="input-group-addon">GB</div>
            </div>
        </div>
        <div class="form-group col-md-10">
            <label for="m_cpu">CPU</label>
            <input type="text" class="form-control" name="m_cpu"/>
        </div>
        <div class="col-md-2">
            <label for="m_hard_drive_space">Hard Drive Space</label>
            <div class="input-group">
                <input type="text" class="form-control" name="m_hard_drive_space"/>
                    <div class="input-group-addon">GB</div>
            </div>
        </div>
        <div class="form-group col-md-10">
            <label for="m_graphics_card">Graphics Card</label>
            <input type="text" class="form-control" name="m_graphics_card"/>
        </div>
        <div class="col-md-2">
            <label for="m_graphics_memory">Graphics Memory</label>
            <div class="input-group">
                <input type="text" class="form-control" name="m_graphics_memory"/>
                    <div class="input-group-addon">GB</div>
            </div>
        </div>

    {{--recommended requirements--}}
    <div class="row"></div>
    <div class="row">Recomended requirements:</div>
        <div class="form-group col-md-10">
            <label for="os">OS</label>
            <input type="text" class="form-control" name="os"/>
        </div>
        <div class="col-md-2">
            <label for="system_RAM">System RAM</label>
            <div class="input-group">
                <input type="text" class="form-control" name="system_RAM"/>
                <div class="input-group-addon">GB</div>
            </div>
        </div>
        <div class="form-group col-md-10">
            <label for="cpu">CPU</label>
            <input type="text" class="form-control" name="cpu"/>
        </div>
        <div class="col-md-2">
            <label for="hard_drive_space">Hard Drive Space</label>
            <div class="input-group">
                <input type="text" class="form-control" name="hard_drive_space"/>
                    <div class="input-group-addon">GB</div>
            </div>
        </div>
        <div class="form-group col-md-10">
            <label for="graphics_card">Graphics Card</label>
            <input type="text" class="form-control" name="graphics_card"/>
        </div>
        <div class="col-md-2">
            <label for="graphics_memory">Graphics Memory</label>
            <div class="input-group">
                <input type="text" class="form-control" name="graphics_memory"/>
                    <div class="input-group-addon">GB</div>
            </div>
        </div>
    </div>

    {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
    {{ Form::close() }}

    </div>

        @stop