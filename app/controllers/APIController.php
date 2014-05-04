<?php

class APIController extends \BaseController {

    public function searchIssue() {

        $input = Input::all();
        $key_word = $input['q'];

        $issue_list = Issue::where('title', 'LIKE', "%$key_word%")->get();

        $return_list = array();

        foreach ($issue_list as $issue_obj) {

            $return_item  = array("name"=>$issue_obj->title, "id"=>$issue_obj->id);

            array_push($return_list, $return_item);

        }

        header('Content-type: application/json');
        echo json_encode($return_list);

    }

    public function searchPolitician() {

        $input = Input::all();
        $key_word = $input['q'];

        $politician_list = Politician::where('name', 'LIKE', "%$key_word%")->get();

        $return_list = array();

        foreach ($politician_list as $politician_obj) {

            $return_item  = array("name"=>$politician_obj->name, "id"=>$politician_obj->id);

            array_push($return_list, $return_item);

        }

        header('Content-type: application/json');
        echo json_encode($return_list);

    }


}
