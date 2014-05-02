@extends('layout')

@section('content')
    <section class="news-manage-block">
        <?php
        if (Auth::check()) {
        ?>
        <div class="well">
            <button type="button" class="btn btn-primary">
                新增新聞
            </button>
        </div>
        <?php
        } else {

            echo View::make('partials.login-link-alert');

        }
        ?>
    </section>
    <section class="news-list-block">

    </section>
@stop