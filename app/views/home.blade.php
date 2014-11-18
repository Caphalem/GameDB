@extends ('layout.main')

@section ('content')
        <div class="search">
           <div class="input-group">
               {{ Form::open(array('route' => 'results')) }}
                   <span class="input-group-btn">
                   {{ Form::text('query', '', array('class' => 'form-control')) }}
                   {{ Form::submit('Search', array('class' => 'btn btn-default')) }}
                   </span>
               {{ Form::close() }}
           </div><!-- /input-group -->
       </div><!-- /.row -->
@stop