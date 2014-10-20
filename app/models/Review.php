<?php
/**
 * Created by PhpStorm.
 * User: Karolis
 * Date: 2014.10.20
 * Time: 22:25
 */

class Review extends Eloquent {
    protected $fillable = array('game_id','user_id');
    protected $table = 'reviews';

    public function game(){
        return $this->belongsTo('Game');
    }
    public function user(){
        return $this->belongsTo('User');
    }

    public function comment(){
        return $this->hasMany('Comment');
    }
} 