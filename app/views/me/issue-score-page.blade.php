@extends('layout')

@section('content')
    <?php
    if (Auth::check()) {

        $login_user_obj = Auth::user();
    ?>
    <section class="issue-list-block row">
        <div class="list-group">
            <?php

            $issue_list = DB::table('issues')
                                ->join('user_issue_score_records', 'issues.id', '=', 'user_issue_score_records.issue_id')
                                ->where('user_issue_score_records.user_id', $login_user_obj->id)
                                ->orderBy('issues.id', 'desc')
                                ->paginate(4);

            foreach ($issue_list as $my_issue_obj) {

                echo View::make(
                            'partials.my-issue-card',
                            array(
                                'issue_obj' => $my_issue_obj
                            )
                        );
            }

            ?>
        </div>
        <div class="text-center">
            <?php echo $issue_list->links(); ?>
        </div>
    </section>
    <?php
    } else {

        echo View::make('partials.login-link-alert');

    }
    ?>
@stop