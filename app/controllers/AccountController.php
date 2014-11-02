<?php
class AccountController extends BaseController {
    public function getSignIn(){
        return View::make('account.signin');
    }

    public function postSignIn(){
        $validator = Validator::make(Input::all(),
            array(
                'email' => 'required|email',
                'password' => 'required'
            )
        );
        if($validator->fails()){
            return Redirect::route('account-sign-in')
                ->withErrors($validator)
                ->withInput();
        }
        else{
            $auth = Auth::attempt(array(
                'email'=> Input::get('email'),
                'password' => Input::get('password'),
                'active' => 1
            ));

            if($auth){
                //Redirect to intended page
                return Redirect::intended('/');
            } else{
                return Redirect::route('account-sign-in')
                    ->with('global','Email/password wrong or account not activated.');
            }
        }
        return Redirect::route('account-sign-in')
            ->with('global','There was a problem signing you in.');
    }

    public function getSignOut(){
        Auth::logout();
        return Redirect::route('home');
    }

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

                Mail::send('emails.auth.activate', array('link' => URL::route('account-activate', $code), 'username' => $username),
                    function($message) use ($user) {
                        $message->to($user->email, $user->name)->subject('Email activation');
                    });

                return Redirect::route('home')
                    ->with('global', 'Your account has been created! We have sent you an email to activate your account.');
            }

        }
    }

    public function getActivate($code) {
        $user = User::where('code', '=', $code)->where('active', '=', 0);

        if ($user->count()) {
            $user = $user->first();

            // Update user to active state
            $user->active = 1;
            $user->code = '';

            if ($user->save()) {
                return Redirect::route('home')
                    ->with('global', 'Your account is activated! You can now sign in.');
            }
        }

        return Redirect::route('home')
            ->with('global', 'We could not activate your account. Try again later.');
    }

}