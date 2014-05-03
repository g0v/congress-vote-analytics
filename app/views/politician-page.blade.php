@extends('layout')

@section('content')
    <section class="politician-manage-block">
        <?php
        if (Auth::check()) {
        ?>
        <div class="well">
            <button type="button" class="btn btn-primary get-add-politician-form-btn">
                新增政治人物
            </button>
        </div>
        <script>
        $(document).ready(function() {

            $(document.body).off('click', '.get-add-politician-form-btn');
            $(document.body).on('click', '.get-add-politician-form-btn', function() {
                $.ajax({
                    url: '/politician/get-add-politician-form',
                    type: "GET",
                    data: {},
                    dataType: "html",
                    beforeSend: function( xhr ) {
                        $('#system-message').html('處理中...');
                        $('#system-message').show();
                    },
                    success: function( html_block ) {
                        $('#system-message').html('完成');
                        $('#system-message').fadeOut();
                        $('#modal-block').html(html_block);
                    }
                });
            });

        });
        </script>
        <?php
        } else {

            echo View::make('partials.login-link-alert');

        }
        ?>
    </section>
    <section class="politician-list-block">
        <h2>政治人物列表</h2>
        <div class="flex-container margin-bottom-3">
            <?php

            $politician_list = DB::table('politicians')
                                        ->orderBy('id', 'desc')
                                        ->paginate(8);

            foreach ($politician_list as $politician_obj) {

                echo View::make(
                            'partials.politician-card',
                            array(
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
@stop