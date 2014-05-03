<?php

class IssueController extends \BaseController {

    public function getIssuePage() {

        return View::make('issue-page', array('active_header' => 'issue-page'));

    }

    public function getAddIssueForm()
    {
        return View::make('modal.add-issue-form');
    }

    public function addPolitician()
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

        $name_input     = $input['name_input'];
        $icon_input     = $input['icon_input'];
        $intro_input    = $input['intro_input'];
        $district_input = $input['district_input'];

        // create news
        $politician_obj                 = new Politician;
        $politician_obj->name           = $name_input;
        $politician_obj->intro          = $intro_input;
        $politician_obj->icon           = $icon_input;
        $politician_obj->district_id    = $district_input;
        $politician_obj->creator_id     = $login_user_obj->id;
        $politician_obj->save();

        $type = 'success';
        $parameter = array("none"=>"none");
        $error_messanger = new FukuPHPErrorMessenger($type, $parameter);
        $error_messanger->printErrorJSON();
        unset($error_messanger);
        return;

    }

}
