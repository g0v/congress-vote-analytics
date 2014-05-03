@extends('layout')

@section('content')
    <section class="news-content-block">
        <?php
        if (Auth::check()) {
        ?>
        <div class="well">
            <form id="get-add-news-form" name="get_add_news_form" class="form-horizontal" role="form" method="get" action="/news/get-add-news-form">
                <div class="form-group row">
                    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                        <input type="text" class="form-control" id="news-url-input" name="news_url_input" placeholder="輸入相關新聞連結...">
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <button id="get-add-news-form-submit" type="submit" class="btn btn-primary">
                            新增新聞
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div id="news-form-block">
        </div>
        <h2>新聞列表</h2>
        <div class="flex-container margin-bottom-3">
            <?php

            $news_list = DB::table('news')
                                ->orderBy('id', 'desc')
                                ->paginate(8);

            foreach ($news_list as $news_obj) {

                echo View::make(
                            'partials.news-card',
                            array(
                                'news_obj' => $news_obj
                            )
                        );
            }

            ?>
        </div>
        <div class="text-center">
            <?php echo $news_list->links(); ?>
        </div>
        <script>
        $(document).ready(function() {

            function getAddNewsFormValidate(formData, jqForm, options) {

                var is_validated = true;

                if (!$('#news-url-input').val()) {
                    $('#news-url-input').parent().addClass('has-error');
                    is_validated = false;
                } else {
                    $('#news-url-input').parent().removeClass('has-error');
                }

                if (is_validated) {

                    $('#get-add-news-form-submit').attr("disabled", "disabled");
                    $('#system-message').html('處理中...');
                    $('#system-message').show();

                }

                return is_validated;

            }

            function getAddNewsFormResponse(responseText, statusText, xhr, $form)  {

                $('#get-add-news-form-submit').removeAttr("disabled");
                $('#system-message').html('成功');
                $('#system-message').fadeOut();


            }


            $('#get-add-news-form').ajaxForm({
                beforeSubmit:   getAddNewsFormValidate,
                success:        getAddNewsFormResponse,
                url:            '/news/get-add-news-form',
                type:           'get',
                target:         '#news-form-block'
            });

        });
        </script>
        <?php
        } else {

            echo View::make('partials.login-link-alert');

        }
        ?>
    </section>
@stop