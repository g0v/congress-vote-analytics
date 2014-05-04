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
            <h2>新聞列表</h2>
            <?php

            $news_list = DB::table('news')
                                ->join('news_politician_records', 'news.id', '=', 'news_politician_records.news_id')
                                ->where('news_politician_records.politician_id', '=', $politician_obj->id)
                                ->groupBy('news.id')
                                ->orderBy('news.id', 'desc')
                                ->paginate(8);

            if ($news_list->count()>0) {

                ?>
                <div class="flex-container margin-bottom-3">
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
    </section>
@stop