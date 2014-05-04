<?php

class Politician extends Eloquent {

    protected $table = 'politicians';

    public function getAVGProScore($issue_id) {

        $results = DB::select(
                                'SELECT AVG(score) avg_score '.
                                'FROM politician_issue_score_records '.
                                'WHERE politician_id=? AND issue_id=? AND score>0',
                                array($this->id, $issue_id)
                            );

        $avg_pro_score = 0;

        foreach ($results as $results_data) {
            $avg_pro_score = $results_data->avg_score;
        }

        return($avg_pro_score);


    }

    public function getAVGConScore($issue_id) {

        $results = DB::select(
                                'SELECT AVG(score) avg_score '.
                                'FROM politician_issue_score_records '.
                                'WHERE politician_id=? AND issue_id=? AND score<0',
                                array($this->id, $issue_id)
                            );

        $avg_con_score = 0;

        foreach ($results as $results_data) {
            $avg_con_score = $results_data->avg_score;
        }

        return($avg_con_score);

    }

}

?>