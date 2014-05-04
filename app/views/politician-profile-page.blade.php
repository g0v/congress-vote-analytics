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
        </div>
    </section>
@stop