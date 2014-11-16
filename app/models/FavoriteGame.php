<?php
/**
 * Created by PhpStorm.
 * User: Karolis
 * Date: 2014.10.20
 * Time: 22:31
 */

class FavoriteGame extends Eloquent{
    protected $fillable = array('game_id','user_id');
    protected $table = 'favorite_games';

    public function game(){
        return $this->belongsTo('Game');
    }
    public function user(){
        return $this->belongsTo('User');
    }
} 