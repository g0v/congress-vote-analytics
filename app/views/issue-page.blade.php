@extends('layout')

@section('content')
    <section class="issue-manage-block">
        <?php
        if (Auth::check()) {
        ?>
        <div class="well">
            <button type="button" class="btn btn-primary">
                新增議題
            </button>
        </div>
        <?php
        } else {

            echo View::make('partials.login-link-alert');

        }
        ?>
    </section>
    <section class="issue-list-block">

    </section>
@stop