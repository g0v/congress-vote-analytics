@extends('layout')

@section('content')
    <section class="issue-block row">
        <div class="list-group">
            <?php

            echo View::make(
                            'partials.issue-card',
                            array(
                                'issue_obj' => $issue_obj
                            )
                        );

            ?>
        </div>
    </section>
    <div>
        <?php

            echo View::make(
                            'partials.issue-tab',
                            array(
                                'active_tab' => $active_tab,
                                'issue_obj' => $issue_obj
                            )
                        );

        ?>
        <section class="issue-list-block row margin-top-3">
            <div class="list-group">
                <?php

                $politician_list = DB::table('politicians')
                                            ->orderBy('id', 'desc')
                                            ->paginate(4);

                foreach ($politician_list as $politician_obj) {

                    echo View::make(
                                    'partials.politician-issue-score-card',
                                    array(
                                        'issue_obj' => $issue_obj,
                                        'politician_obj' => $politician_obj
                                    )
                                );
                }

                ?>
            </div>
            <div class="text-center">
                <?php echo $politician_list->links(); ?>
            </div>
        </section>
    </div>
@stop