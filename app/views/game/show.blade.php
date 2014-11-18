@extends('layout.main')
@section('content')

{{HTML::script('js/expanding.js')}}
{{HTML::script('js/starrr.js')}}
<script type="text/javascript">
    $(function(){
// initialize the autosize plugin on the review text area
        $('#new-review').autosize({append: "\n"});
        var reviewBox = $('#post-review-box');
        var newReview = $('#new-review');
        var openReviewBtn = $('#open-review-box');
        var closeReviewBtn = $('#close-review-box');
        var ratingsField = $('#ratings-hidden');
        openReviewBtn.click(function(e)
        {
            reviewBox.slideDown(400, function()
            {
                $('#new-review').trigger('autosize.resize');
                newReview.focus();
            });
            openReviewBtn.fadeOut(100);
            closeReviewBtn.show();
        });
        closeReviewBtn.click(function(e)
        {
            e.preventDefault();
            reviewBox.slideUp(300, function()
            {
                newReview.focus();
                openReviewBtn.fadeIn(200);
            });
            closeReviewBtn.hide();
        });
// If there were validation errors we need to open the comment form programmatically
        @if($errors->first('content') || $errors->first('rating'))
            openReviewBtn.click();
@endif
// Bind the change event for the star rating - store the rating value in a hidden field
        $('.starrr').on('starrr:change', function(e, value){
            ratingsField.val(value);
        });
    });
</script>
<style type="text/css">
    /* Enhance the look of the textarea expanding animation */
    .animated {
        -webkit-transition: height 0.2s;
        -moz-transition: height 0.2s;
        transition: height 0.2s;
    }
    .stars {
        margin: 20px 0;
        font-size: 24px;
        color: #d17581;
    }
</style>

<div class="col-md-2"><img class="img-responsive" src="/public/images/box_art/{{ $game->box_art }}" ></div>
    <div class="col-md-10 vertical-center">
        <h1>{{ $game->title }}</h1><br>
        @if(Auth::check())
        @if($fav == 0)
        Add to favorites <a href="{{ URL::route('add-to-list', array(Auth::user()->id, $game->id)) }}"><img src="{{ asset('images/add.png') }}"></a>
        @elseif($fav == 1)
        Remove from favorites <a href="{{ URL::route('remove-from-list', array(Auth::user()->id, $game->id)) }}"><img src="{{ asset('images/remove.png') }}"></a>
        @endif
        @endif
    </div>
    <div class="col-md-12">
    <br>
    <b>Publisher: </b>{{ $game->publisher->title }}<br>
    <b>Developer: </b>{{ $game->developer->title }}<br>
    <b>Minimal requirements: </b><br>
    <b>Recomended requirements: </b><br>
    <b>Metacritic score: </b>{{ $game->metacritic_score }}<br>
    <b>User rating: </b>{{ $game->user_rating }}<br>
    <b>Release date: </b>{{ $game->release_date }}<br>
    <b>Link to metacritic: </b>{{ $game->link_to_metacritic }}<br>
        <b>Description: </b>{{ $game->description }}<br>
        @for ($i=1; $i <= 5 ; $i++)
        <span class="glyphicon glyphicon-star{{ ($i <= $game->rating_cache) ? '' : '-empty'}}"></span>
        @endfor
        {{ number_format($game->rating_cache, 1);}} stars
        <div class="text-right">
            <a id="open-review-box" class="btn btn-success btn-green">Leave a Review</a>
        </div>
        <div class="row" id="post-review-box" style="display:none;">
            <div class="col-md-12">
                {{Form::open()}}
                {{Form::hidden('rating', null, array('id'=>'ratings-hidden'))}}
                {{Form::textarea('content', null, array('rows'=>'5','id'=>'new-review','class'=>'form-control animated','placeholder'=>'Enter your review here...'))}}
                <div class="text-right">
                    <div class="stars starrr" data-rating="{{Input::old('rating',0)}}"></div>
                    <a class="btn btn-danger" id="close-review-box"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
                    <button class="btn btn-success"><span class="glyphicon glyphicon-ok" type="submit"></span> Save</button>
                </div>
                {{Form::close()}}
            </div>
        </div>
        @foreach($reviews as $review)
        <hr>
        <div class="row">
            <div class="col-md-12">
                @for ($i=1; $i <= 5 ; $i++)
                <span class="glyphicon glyphicon-star{{ ($i <= $review->rating) ? '' : '-empty'}}"></span>
                @endfor
                {{ $review->user ? $review->user->username : 'Anonymous'}} <span class="pull-right">{{$review->timeago}}</span>
                <p>{{{$review->content}}}</p>
            </div>
        </div>
        @endforeach
    </div>


@stop