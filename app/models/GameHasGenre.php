<?php
/**
 * Created by PhpStorm.
 * User: Karolis
 * Date: 2014.10.20
 * Time: 22:33
 */

class GameHasGenre extends Eloquent{
    protected $fillable = array('games_id','genres_id');
    protected $table = 'games_has_genres';

    public function game(){
        return $this->belongsTo('Game');
    }
    public function genre(){
        return $this->belongsTo('Genre');
    }
} 