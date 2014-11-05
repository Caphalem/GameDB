<?php
/**
 * Created by PhpStorm.
 * User: Karolis
 * Date: 2014.10.20
 * Time: 22:20
 */

class Game extends Eloquent {
    protected $fillable = array('box_art', 'title', 'publisher_id','developer_id','minimal_requirements_id','recomended_requirements_id','metacritic_score','release_date','link_to_metacritic','description','user_rating');
    protected $guarded = 'id';
    protected $table = 'games';

    public function publisher(){
    return $this->belongsTo('Publisher');
    }
    public function developer() {
        return $this->belongsTo('Developer');
    }
    public function minimal_requirements() {
        return $this->belongsTo('Requirements');
    }
    public function recomended_requirements() {
        return $this->belongsTo('Requirements');
    }

    public function rating(){
        return $this->hasMany('Rating');
    }
    public function review(){
        return $this->hasMany('Review');
    }
    public function favorite_game(){
        return $this->hasMany('Favorite_game');
    }
    public function comment(){
        return $this->hasMany('Comment');
    }
    public function game_has_genre(){
        return $this->hasMany('Game_has_genre');
    }
}