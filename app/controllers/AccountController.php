<?php
class AccountController extends BaseController {

    public function getCreate() {
        return View::make('account.create');
    }

    public function postCreate() {
        $validator = Validator::make(Input::all(),
            array(
                'email'             => 'required|max:50|email|unique:users',
                'username'          => 'required|max:20|min:3|alpha_dash|unique:users',
                'first_name'        => 'required',
                'last_name'         => 'required',
                'password'          => 'required|min:6',
                'password_again'    => 'required|same:password',

            )
        );

        if($validator->fails()){
            return  Redirect::route('account-create')
                    ->withErrors($validator)
                    ->withInput();
        } else {

            $email      = Input::get('email');
            $username   = Input::get('username');
            $first_name   = Input::get('first_name');
            $last_name   = Input::get('last_name');
            $password   = Input::get('password');

                //Activation code
            $code       = str_random(60);

            $user = User::create(array(
                'email' => $email,
                'username' => $username,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'password' => Hash::make($password),
                'code' => $code,
                'active' => 0
            ));

            if($user){

                //Send activation email

                return Redirect::route('home')
                    ->with('global', 'Your account has been created');
            }

        }
    }

}