<?php

Class Admin_Controller extends Base_Controller
{


	public function action_index ()
	{
		$user = Auth::user();
   		return View::make('new')->with('user', $user);
	}

}