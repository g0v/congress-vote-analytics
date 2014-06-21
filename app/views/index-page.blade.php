@extends('layout')

@section('content')
    <section>
        <h2>推薦議題</h2>
        <section class="issue-list-block row">
            <div class="list-group">
                <?php

                $issue_list = DB::table('issues')
                                    ->orderBy(DB::raw('RAND()'))
                                    ->paginate(3);

                foreach ($issue_list as $issue_obj) {

                    echo View::make(
                                'partials.issue-card',
                                array(
                                    'issue_obj' => $issue_obj
                                )
                            );
                }

                ?>
            </div>
        </section>
    </section>
    <section>
        <h2>新聞快報</h2>
        <div class="flex-container margin-bottom-3">
            <?php

            $news_list = DB::table('news')
                                ->orderBy(DB::raw('RAND()'))
                                ->paginate(4);

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
    </section>
    <section>
        <h2>政治人物</h2>
        <div class="flex-container margin-bottom-3">
            <?php

            $politician_list = DB::table('politicians')
                                ->orderBy(DB::raw('RAND()'))
                                ->paginate(4);

            foreach ($politician_list as $politician_obj) {

                echo View::make(
                            'partials.politician-avatar-card',
                            array(
                                'politician_obj' => $politician_obj
                            )
                        );
            }

            ?>
        </div>
    </section>
    <section>
        <h2>活躍會員</h2>
        <div class="flex-container margin-bottom-3">
            <?php

            $user_list = DB::table('users')
                                ->orderBy(DB::raw('RAND()'))
                                ->paginate(4);

            foreach ($user_list as $user_obj) {

                echo View::make(
                            'partials.user-avatar-card',
                            array(
                                'user_obj' => $user_obj
                            )
                        );
            }

            ?>
        </div>
    </section>
    <section>
        <h2>123</h2>
    </section>

@stop
