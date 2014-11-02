<?php

class AdminController extends BaseController {

    public function showUsers() {
        $usr = User::where('role', "!=", 2)->get();
        return View::make('admin.users')->with('usr', $usr);
    }

    public function addModerator($id) {
        $usr = User::find($id);
        $usr->role = 1;
        $usr->save();
        return Redirect::route('admin-users');
    }

    public function removeModerator($id) {
        $usr = User::find($id);
        $usr->role = 0;
        $usr->save();
        return Redirect::route('admin-users');
    }

}