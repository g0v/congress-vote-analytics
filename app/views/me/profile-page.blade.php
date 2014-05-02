@extends('layout')

@section('content')
    <section>
        <?php
        if (Auth::check()) {
        ?>

        <?php
        } else {

            echo View::make('partials.login-link-alert');

        }
        ?>
    </section>
@stop
