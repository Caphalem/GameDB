<?php
/**
 * Created by PhpStorm.
 * User: Karolis
 * Date: 2014.10.20
 * Time: 22:25
 */

class Review extends Eloquent {
    protected $fillable = array('game_id','user_id', 'date', 'rating', 'content');
    protected $table = 'reviews';

    public function game(){
        return $this->belongsTo('Game');
    }
    public function user(){
        return $this->belongsTo('User');
    }

    public function getCreateRules()
    {
        return array(
            'content'=>'required',
            'rating'=>'required|integer|between:1,5'
        );
    }

    public function getTimeagoAttribute()
    {
        $date = \Carbon\Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();
        return $date;
    }
// this function takes in product ID, comment and the rating and attaches the review to the product by its ID, then the average rating for the product is recalculated
    public function storeReviewForGame($gameid, $content, $rating)
    {
        $game = Game::find($gameid);
        $this->user_id = Auth::user()->id;
        $this->content = $content;
        $this->rating = $rating;
        $game->reviews()->save($this);
// recalculate ratings for the specified product
        $game->recalculateRating($rating);
    }
} 