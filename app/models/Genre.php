<?php
/**
 * Created by PhpStorm.
 * User: Karolis
 * Date: 2014.10.20
 * Time: 22:32
 */

class Genre extends Eloquent {
    protected $fillable = array('title');
    protected $table = 'genres';

    public function game_has_genre(){
        return $this->hasMany('Game_has_genre');
    }
} 