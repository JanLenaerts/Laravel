<?php

Class Login_Controller extends Base_Controller
{

	public $restful = true;



	// Show Login Form
	public function get_index()
	{
		return View::make('login');
	}

	// Logout
	public function get_logout()
	{
		Auth::logout();
    	return Redirect::to('/');
	}

	// Authenticate user 
	public function post_index()
	{
		$userinfo = array(
	        'username' => Input::get('username'),
	        'password' => Input::get('password')
	    );
	    if ( Auth::attempt($userinfo) )
	    {
	        return Redirect::to('admin');
	    }
	    else
	    {
	        return Redirect::to('login')
	            ->with('login_errors', true);
	    }
	}

}