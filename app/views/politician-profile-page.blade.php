@extends('layout')

@section('content')
    <section class="politician-block">
        <div>
            <?php

            echo View::make(
                            'partials.politician-profile-card',
                            array(
                                'politician_obj' => $politician_obj
                            )
                        );

            ?>
        </div>
        <div>
            <?php

                echo View::make(
                                'partials.politician-tab',
                                array(
                                    'active_tab' => $active_tab,
                                    'politician_obj' => $politician_obj
                                )
                            );

            ?>
            <section class="issue-list-block row margin-top-3">
                <div class="list-group">
                    <?php

                    $issue_list = DB::table('issues')
                                        ->orderBy('id', 'desc')
                                        ->paginate(4);

                    foreach ($issue_list as $issue_obj) {

                        echo View::make(
                                    'partials.politician-issue-card',
                                    array(
                                        'issue_obj' => $issue_obj,
                                        'politician_obj' => $politician_obj
                                    )
                                );
                    }

                    ?>
                </div>
                <div class="text-center">
                    <?php echo $issue_list->links(); ?>
                </div>
            </section>
        </div>
    </section>
@stop