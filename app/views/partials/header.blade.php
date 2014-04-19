<?php 

$issue_page_active = '';
$politicial_page_active = '';

switch ($active_header) {

case 'issue-page':
    $issue_page_active = 'active';
    break;

case 'politicial-page':
    $politicial_page_active = 'active';
    break;

}

?>
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
                選票成份分析系統
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="<?php echo $issue_page_active; ?>">
                    <a href="/issue">
                        議題列表
                    </a>
                </li>
                <li class="<?php echo $politicial_page_active; ?>">
                    <a href="/politician">
                        立委列表
                    </a>
                </li>
            </ul>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="輸入議題或立委關鍵字">
                </div>
                <button type="submit" class="btn btn-default">
                    搜尋
                </button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="/login">
                        登入
                    </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>