@extends ('layout.main')
@section ('content')
    {{ Form::open(array('route' => 'game.store', 'files' => true)) }}
        {{--title--}}
        <div>
            {{ Form::label('title', 'Game title: ') }}
            {{ Form::text('title') }}
        </div>
        {{--publisher--}}
        <div>
            {{ Form::label('publisher', 'Publisher id: ') }}
            {{ Form::number('publisher_id') }}
        </div>
        {{--developer--}}
        <div>
            {{ Form::label('developer', 'Developer id: ') }}
            {{ Form::number('developer_id') }}
        </div>
        {{--minimal requirements--}}
        <div>
            {{ Form::label('min req', 'Minimal requirements id: ') }}
            {{ Form::number('minimal_requirements_id') }}
        </div>
        {{--recommended requirements--}}
        <div>
            {{ Form::label('req req', 'Recommended requirements id: ') }}
            {{ Form::number('recommended_requirements_id') }}
        </div>
        {{--metacritic score--}}
        {{--
        <div>
            {{ Form::label('metacritic_rating', 'Metacritic rating: ') }}
            {{ Form::number('metacritic_rating') }}
        </div>
        --}}
        {{--release date--}}
        <div>
            {{ Form::label('release_date', '(Release Date) ') }}
            {{ Form::label('day', 'Day: ') }}
            {{ Form::number('day') }}
            {{ Form::label('month', 'Month: ') }}
            {{ Form::number('month') }}
            {{ Form::label('year', 'Year: ') }}
            {{ Form::number('year') }}
        </div>
        {{--metacritic link--}}
        <div>
            {{ Form::label('metacritic_link', 'Metacritic link: ') }}
            {{ Form::text('metacritic_link') }}
        </div>
        {{--box art--}}
        <div>
            {{ Form::label('box_art', 'Box Art: ') }}
            {{ Form::file('box_art') }}
        </div>
        {{--description--}}
        <div>
            {{ Form::label('description', 'Game description: ') }}
            {{ Form::text('description') }}
        </div>
        {{--user rating--}}
        {{--
        <div>
            {{ Form::label('user_rating', 'User rating (replace in the future): ') }}
            {{ Form::number('user_rating') }}
        </div>
        --}}

        {{ Form::submit('Submit Data') }}
    {{ Form::close() }}

@stop