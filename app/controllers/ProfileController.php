<?php
class ProfileController extends BaseController{
    public function getProfile(){
        return View::make('profile.user');
    }

    public function getChangeProfile(){
        return View::make('profile.change');
    }
    public function postChangeProfile(){
        $validator = Validator::make(Input::all(),
            array(
                'new_email'             => 'max:20|email',
                'new_first_name'             => 'max:20',
                'new_last_name'             => 'max:20',
                'new_username'          => 'max:20|min:3'
            )
        );
        if($validator->fails()){
            return Redirect::route('profile-change')
                ->withErrors($validator);
        }else {
            $user=User::find(Auth::user()->id);
            $new_username =      Input::get('new_username');
            $new_first_name =    Input::get('new_first_name');
            $new_last_name =     Input::get('new_last_name');
            $new_email =         Input::get('new_email');

            if($new_first_name!=null) {
                $user->first_name = $new_first_name;
            }
            if($new_username!=null) {
                $user->username = $new_username;
            }
            if($new_email!=null) {
                $user->email = $new_email;
            }
            if($new_last_name!=null) {
                $user->last_name = $new_last_name;
            }
            $user->save();
                return Redirect::route('profile-user')
                    ->with('global', 'Your account profile information has been successfully changed');

        }
        return Redirect::route('profile-change')
            ->with('global','Your information could not be changed.');
    }
}