<?php

class UserController extends Controller
{

	public function joinSession(){
		$session_ID = DB::select("select session_ID from session where session_name = '".Input::get('session')."'")[0]->session_ID;
		$user = array(
            'user_name' => Input::get('name'),
            'user_session_ID' => $session_ID,
            'user_session_pw' => Input::get('pwd')
        );
        $newUser = User::create($user);
        if($newUser){
            Auth::User()->login($newUser);
            return Redirect::route('user/user');
        }
	}

	public function getjoinSession(){
        return View::make('user/join');
	}

    public function showEnd(){
        return View::make('user/end');
    }
    public function logout() {
        Auth::User()->logout();
        return View::make("index");
    }
}