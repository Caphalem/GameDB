<?php
/**
 * Created by PhpStorm.
 * User: Karolis
 * Date: 2014.10.20
 * Time: 22:20
 */

class Game extends Eloquent {
    protected $fillable = array('box_art', 'title', 'publisher_id','developer_id','minimal_requirements_id','recommended_requirements_id','metacritic_score','release_date','link_to_metacritic','description');
    protected $guarded = 'id';
    protected $table = 'games';

    public function publisher(){
    return $this->belongsTo('Publisher');
    }
    public function developer() {
        return $this->belongsTo('Developer');
    }
    public function minimalRequirements() {
        return $this->belongsTo('Requirements');
    }
    public function recomendedRequirements() {
        return $this->belongsTo('Requirements');
    }

    public function rating(){
        return $this->hasMany('Rating');
    }
    public function reviews(){
        return $this->hasMany('Review');
    }
    public function favoriteGame(){
        return $this->hasMany('Favorite_game');
    }
    public function comment(){
        return $this->hasMany('Comment');
    }
    public function gameHasGenre(){
        return $this->hasMany('Game_has_genre');
    }

    public function recalculateRating($rating)
    {
        $reviews = $this->reviews();
        $avgRating = $reviews->avg('rating');
        $this->rating_cache = round($avgRating,1);
        $this->rating_count = $reviews->count();
        $this->save();
    }
}