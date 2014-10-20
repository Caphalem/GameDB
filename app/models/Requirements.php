<?php
/**
 * Created by PhpStorm.
 * User: Karolis
 * Date: 2014.10.20
 * Time: 22:36
 */

class Requirements extends Eloquent{
    protected $fillable = array('os','cpu','system_RAM','graphics_card','graphics_memory','hard_drive_space');
    protected $table = 'requiremenets';

    public function game(){
        return $this->hasMany('Game');
    }
} 