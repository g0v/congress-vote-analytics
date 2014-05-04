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
        <?php

        $news_list = DB::table('news')
                            ->join('news_issue_records', 'news.id', '=', 'news_issue_records.news_id')
                            ->where('news_issue_records.issue_id', '=', $issue_obj->id)
                            ->groupBy('news.id')
                            ->orderBy('news.id', 'desc')
                            ->paginate(8);

        if ($news_list->count()>0) {

            ?>
            <div class="flex-container margin-bottom-3 margin-top-3">
            <?php
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
            <?php

        } else {
            ?>
            <div class="alert alert-warning alert-dismissable">
                目前沒有相關新聞，請至 <strong><a href="/news">新聞列表</a></strong> 頁面幫忙新增相關新聞，謝謝！
            </div>
            <?php
        }

        ?>
        <div class="text-center">
            <?php echo $news_list->links(); ?>
        </div>
    </div>
@stop