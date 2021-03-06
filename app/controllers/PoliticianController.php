<?php

class PoliticianController extends \BaseController {

    public function getPoliticianPage() {

        return View::make('politician-page', array('active_header' => 'politician-page'));

    }

    public function getAddPoliticianForm()
    {
        return View::make('modal.add-politician-form');
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

        $politician_obj = DB::table('politicians')->where('name', $name_input)->first();

        if (!empty($politician_obj)) {

            $type = 'politician_exist';
            $parameter = array("none"=>"none");
            $error_messanger = new FukuPHPErrorMessenger($type, $parameter);
            $error_messanger->printErrorJSON();
            unset($error_messanger);
            return;

        }

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

    public function showPolitician($id) {

        $input = Input::all();
        $politician_obj = Politician::find($id);

        return View::make(
                        'politician-profile-page',
                        array(
                            'active_header' => 'politician-page',
                            'active_tab' => 'politician-score',
                            'politician_obj' => $politician_obj)
                        );

    }

    public function showPoliticianNews($id) {

        $input = Input::all();

        $politician_obj = Politician::find($id);

        return View::make(
                        'politician-profile-news-page',
                        array(
                            'active_header' => 'politician-page',
                            'active_tab' => 'politician-news',
                            'politician_obj' => $politician_obj)
                        );

    }

}
