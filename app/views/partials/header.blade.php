<?php

$issue_page_active = '';
$politician_page_active = '';
$news_page_active = '';
$district_page_active = '';

switch ($active_header) {

case 'issue-page':
    $issue_page_active = 'active';
    break;

case 'politician-page':
    $politician_page_active = 'active';
    break;

case 'news-page':
    $news_page_active = 'active';
    break;

case 'district-page':
    $district_page_active = 'active';
    break;

case 'no-active':
default:
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
                <li class="<?php echo $politician_page_active; ?>">
                    <a href="/politician">
                        立委列表
                    </a>
                </li>
                <li class="<?php echo $news_page_active; ?>">
                    <a href="/news">
                        新聞列表
                    </a>
                </li>
                <li class="<?php echo $district_page_active; ?>">
                    <a href="/district">
                        選區列表
                    </a>
                </li>
            </ul>
            <!--<form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="輸入議題或立委關鍵字">
                </div>
                <button type="submit" class="btn btn-default">
                    搜尋
                </button>
            </form>-->
            <ul class="nav navbar-nav navbar-right">
                <?php
                if (Auth::check()) {

                    $login_user_obj = Auth::user();

                ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i><img src="<?php echo $login_user_obj->avatar_url; ?>" style="width: 16px;"></i>
                        <?php echo $login_user_obj->name; ?> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/me/profile">
                                個人資料
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="/logout">
                                登出
                            </a>
                        </li>
                    </ul>
                </li>
                <?php } else { ?>
                <li>
                    <a class="login-link" href="#">
                        登入
                    </a>
                </li>
                <?php } ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>