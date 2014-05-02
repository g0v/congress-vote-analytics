<?php

class MeController extends \BaseController {

	public function getMeProfilePage()
	{
		return View::make('me.profile-page', array('active_header' => 'no-active'));
	}

    public function postUpdateProfile()
    {

        if (Auth::check()) {

            $input = Input::all();

            $email_input    = $input['email_input'];
            $name_input     = $input['name_input'];
            $intro_input    = $input['intro_input'];
            $district_input = $input['district_input'];

            $login_user_obj = Auth::user();

            $login_user_obj->email          = $email_input;
            $login_user_obj->name           = $name_input;
            $login_user_obj->intro          = $intro_input;
            $login_user_obj->district_id    = $district_input;
            $login_user_obj->save();

            $type = 'success';
            $parameter = array("none"=>"none");
            $error_messanger = new FukuPHPErrorMessenger($type, $parameter);
            $error_messanger->printErrorJSON();
            unset($error_messanger);
            return;

        } else {

            $type = 'unknow_error';
            $parameter = array("none"=>"none");
            $error_messanger = new FukuPHPErrorMessenger($type, $parameter);
            $error_messanger->printErrorJSON();
            unset($error_messanger);
            return;
        }

    }

}
