<?php
$issue_politician_score_active = '';
$issue_news_active = '';

switch ($active_tab) {

case 'issue-politician-score':
    $issue_politician_score_active = 'active';
    break;

case 'issue-news':
    $issue_news_active = 'active';
    break;

case 'no-active':
default:
    break;

}
?>
<ul class="nav nav-tabs">
    <li class="<?php echo $issue_politician_score_active; ?>">
        <a href="/issue/<?php echo $issue_obj->id; ?>">
            政治人物立場
        </a>
    </li>
    <li class="<?php echo $issue_news_active; ?>">
        <a href="/issue/<?php echo $issue_obj->id; ?>/news">
            相關新聞
        </a>
    </li>
</ul>