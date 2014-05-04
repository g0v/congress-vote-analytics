<?php

class IssueController extends \BaseController {

    public function getIssuePage() {

        return View::make('issue-page', array('active_header' => 'issue-page'));

    }

    public function getAddIssueForm()
    {
        return View::make('modal.add-issue-form');
    }

    public function addIssue()
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

        $title_input     = $input['title_input'];
        $icon_input     = $input['icon_input'];

        // create news
        $issue_obj                 = new Issue;
        $issue_obj->title          = $title_input;
        $issue_obj->icon           = $icon_input;
        $issue_obj->creator_id     = $login_user_obj->id;
        $issue_obj->save();

        $type = 'success';
        $parameter = array("none"=>"none");
        $error_messanger = new FukuPHPErrorMessenger($type, $parameter);
        $error_messanger->printErrorJSON();
        unset($error_messanger);
        return;

    }

}