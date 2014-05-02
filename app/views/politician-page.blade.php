@extends('layout')

@section('content')
    <section class="politician-manage-block">
        <?php
        if (Auth::check()) {
        ?>
        <div class="well">
            <button type="button" class="btn btn-primary">
                新增立委
            </button>
        </div>
        <?php
        } else {

            echo View::make('partials.login-link-alert');

        }
        ?>
    </section>
    <section class="politician-list-block">

    </section>
@stop