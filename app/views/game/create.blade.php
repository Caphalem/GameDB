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


        {{--minimal requirements--}}
        <div class="form-group col-md-6">
            <label for="min_requirements">Minimal requirements</label>
            <div class="input-group">
                {{ Form::select('min_requirements', $requirements, null, array('class'=>'form-control','style'=>'' )) }}
                <div class="input-group-btn"><a href="{{ action('RequirementsController@create') }}" class="btn btn-default">Add</a></div>
            </div>

        </div>
        {{--recommended requirements--}}
    <div class="form-group col-md-6">
        <label for="rec_requirements">Recommended requirements</label>
        <div class="input-group">
            {{ Form::select('rec_requirements', $requirements, null, array('class'=>'form-control','style'=>'' )) }}

            <div class="input-group-btn"><a href="{{ action('RequirementsController@create') }}" class="btn btn-default">Add</a></div>
        </div>

    </div>

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

        {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}

        </div>

        @stop