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

        $issue_obj = DB::table('issues')->where('title', $title_input)->first();

        if (!empty($issue_obj)) {

            $type = 'issue_exist';
            $parameter = array("none"=>"none");
            $error_messanger = new FukuPHPErrorMessenger($type, $parameter);
            $error_messanger->printErrorJSON();
            unset($error_messanger);
            return;

        }

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

    public function showIssue($id) {

        $input = Input::all();
        $issue_obj = Issue::find($id);

        return View::make(
                        'issue-profile-page',
                        array(
                            'active_header' => 'issue-page',
                            'active_tab' => 'issue-politician-score',
                            'issue_obj' => $issue_obj)
                        );

    }

    public function showIssueNews($id) {

        $input = Input::all();
        $issue_obj = Issue::find($id);

        return View::make(
                        'issue-profile-news-page',
                        array(
                            'active_header' => 'issue-page',
                            'active_tab' => 'issue-news',
                            'issue_obj' => $issue_obj)
                        );

    }

}
