<?php

class MeController extends \BaseController {

	public function getMeProfilePage()
	{
		return View::make('me.profile-page', array('active_header' => 'no-active'));
	}

}
