<?php
/**
 * Created by PhpStorm.
 * User: Karolis
 * Date: 2014.10.20
 * Time: 22:48
 */

class Developer extends Eloquent{
    public $timestamps = false;
    protected $fillable = array('title','description');
    protected $table = 'developers';

    public function game(){
        return $this->hasMany('Game');
    }
}