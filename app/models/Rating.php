<?php
/**
 * Created by PhpStorm.
 * User: Karolis
 * Date: 2014.10.20
 * Time: 22:27
 */

class Rating extends Eloquent{
    protected $fillable = array('game_id','user_id','score');
    protected $table = 'ratings';

    public function game(){
        return $this->belongsTo('Game');
    }
    public function user(){
        return $this->belongsTo('User');
    }
} 