<?php
/**
 * Created by PhpStorm.
 * User: Karolis
 * Date: 2014.10.20
 * Time: 22:29
 */

class Comment extends Eloquent {
    protected $fillable = array('game_id','review_id','user_id');
    protected $table = 'comments';

    public function game(){
        return $this->belongsTo('Game');
    }
    public function review(){
        return $this->belongsTo('Review');
    }
    public function user(){
        return $this->belongsTo('User');
    }
} 