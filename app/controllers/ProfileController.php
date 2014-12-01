<?php
class ProfileController extends BaseController{
    public function getProfile(){
        return View::make('profile.user');
    }
}