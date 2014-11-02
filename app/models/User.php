<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
    protected $fillable = array('username','first_name','last_name','email','role','password','password_temp','code','active','remember_token');
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');
    public function getAuthPassword() {
        return $this->password;
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

}
