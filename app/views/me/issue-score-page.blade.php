@extends('layout')

@section('content')
    <?php
    if (Auth::check()) {

        $login_user_obj = Auth::user();
    ?>
    <section>
        <h2>你的議題立場</h2>
        <section class="issue-list-block row">

            <div class="list-group">
                <?php

                $issue_list = DB::table('issues')
                                    ->join('user_issue_score_records', 'issues.id', '=', 'user_issue_score_records.issue_id')
                                    ->where('user_issue_score_records.user_id', $login_user_obj->id)
                                    ->orderBy('issues.id', 'desc')
                                    ->paginate(4);

                if (!empty($issue_list)) {

                    foreach ($issue_list as $issue_list_data) {

                        echo View::make(
                                    'partials.my-issue-card',
                                    array(
                                        'issue_list_data' => $issue_list_data
                                    )
                                );
                    }

                }

                ?>
            </div>
            <div class="text-center">
                <?php

                if (!empty($issue_list)) {

                    echo $issue_list->links();

                }

                ?>
            </div>
        </section>
    </section>
    <?php
    } else {

        echo View::make('partials.login-link-alert');

    }
    ?>
@stop