<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>選票成份分析</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    {{ HTML::style('css/va.css'); }}
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    {{ HTML::script('js/form/jquery.form.js'); }}
    {{ HTML::script('js/va.js'); }}
</head>
<body>
    <?php echo View::make('partials.header', array('active_header' => $active_header)); ?>
    <div id="wrap" class="container">
        <div id="content">
            @yield('content')
        </div>
        <?php echo View::make('partials.footer') ?>
    </div>
    <div id="system-message">
    </div>
    <div id="modal-block" class="modal fade" role="dialog" aria-hidden="true">
    </div>
</body>
</html>
