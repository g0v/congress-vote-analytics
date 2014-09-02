<?php

class Issue extends Eloquent {

    protected $table = 'issues';

    public function getAVGProScore() {

        $results = DB::select('SELECT AVG(score) avg_score '.
                              'FROM user_issue_score_records '.
                              'WHERE issue_id=? AND score>0', array($this->id));

        $avg_pro_score = 0;

        foreach ($results as $results_data) {
            $avg_pro_score = $results_data->avg_score;
        }

        return($avg_pro_score);


    }

    public function getAVGConScore() {

        $results = DB::select('SELECT AVG(score) avg_score '.
                              'FROM user_issue_score_records '.
                              'WHERE issue_id=? AND score<0', array($this->id));

        $avg_con_score = 0;

        foreach ($results as $results_data) {
            $avg_con_score = $results_data->avg_score;
        }

        return($avg_con_score);

    }

    public function staticAVGProScore($issue_id) {

        $results = DB::select('SELECT AVG(score) avg_score '.
                              'FROM user_issue_score_records '.
                              'WHERE issue_id=? AND score>0', array($issue_id));

        $avg_pro_score = 0;

        foreach ($results as $results_data) {
            $avg_pro_score = $results_data->avg_score;
        }

        return($avg_pro_score);


    }

    public function staticAVGConScore($issue_id) {

        $results = DB::select('SELECT AVG(score) avg_score '.
                              'FROM user_issue_score_records '.
                              'WHERE issue_id=? AND score<0', array($issue_id));

        $avg_con_score = 0;

        foreach ($results as $results_data) {
            $avg_con_score = $results_data->avg_score;
        }

        return($avg_con_score);

    }

}

?>