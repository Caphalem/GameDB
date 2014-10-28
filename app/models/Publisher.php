<?php
/**
 * Created by PhpStorm.
 * User: Karolis
 * Date: 2014.10.20
 * Time: 22:47
 */

class Publisher extends Eloquent{
    public $timestamps = false;
    protected $fillable = array('title','description');
    protected $table = 'publisher';

    public function game(){
        return $this->hasMany('Game');
    }
}