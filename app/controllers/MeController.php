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

    public function postUpdateIssueScore()
    {

        if (!Auth::check()) {

            $type = 'unknow_error';
            $parameter = array("none"=>"none");
            $error_messanger = new FukuPHPErrorMessenger($type, $parameter);
            $error_messanger->printErrorJSON();
            unset($error_messanger);
            return;

        }

        $login_user_obj = Auth::user();

        $input = Input::all();

        $issue_id       = $input['issue_id'];
        $issue_score    = $input['issue_score'];

        $user_issue_score_record_obj = DB::table('user_issue_score_records')
                                            ->where('user_id', $login_user_obj->id)
                                            ->where('issue_id', $issue_id)
                                            ->first();

        if (empty($user_issue_score_record_obj)) {

            // create
            $user_issue_score_record_obj = new UserIssueScoreRecord;
            $user_issue_score_record_obj->user_id   = $login_user_obj->id;
            $user_issue_score_record_obj->issue_id  = $issue_id;
            $user_issue_score_record_obj->score     = $issue_score;
            $user_issue_score_record_obj->save();

        } else {

            // update
            $user_issue_score_record_obj = UserIssueScoreRecord::find($user_issue_score_record_obj->id);
            $user_issue_score_record_obj->user_id   = $login_user_obj->id;
            $user_issue_score_record_obj->issue_id  = $issue_id;
            $user_issue_score_record_obj->score     = $issue_score;
            $user_issue_score_record_obj->save();
        }

        $type = 'success';
        $parameter = array("none"=>"none");
        $error_messanger = new FukuPHPErrorMessenger($type, $parameter);
        $error_messanger->printErrorJSON();
        unset($error_messanger);
        return;

    }

}
