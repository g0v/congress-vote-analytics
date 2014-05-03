@extends('layout')

@section('content')
    <section class="issue-manage-block">
        <?php
        if (Auth::check()) {
        ?>
        <div class="well">
            <button type="button" class="btn btn-primary get-add-issue-form-btn">
                新增議題
            </button>
        </div>
        <script>
        $(document).ready(function() {

            $(document.body).off('click', '.get-add-issue-form-btn');
            $(document.body).on('click', '.get-add-issue-form-btn', function() {
                $.ajax({
                    url: '/issue/get-add-issue-form',
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
    <section class="issue-list-block">

    </section>
@stop