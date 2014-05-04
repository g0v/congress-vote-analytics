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
@stop