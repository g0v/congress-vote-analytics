<?php
$politician_issue_score_active = '';
$politician_news_active = '';

switch ($active_tab) {

case 'politician-score':
    $politician_issue_score_active = 'active';
    break;

case 'politician-news':
    $politician_news_active = 'active';
    break;

case 'no-active':
default:
    break;

}
?>
<ul class="nav nav-tabs">
    <li class="<?php echo $politician_issue_score_active; ?>">
        <a href="/politician/<?php echo $politician_obj->id; ?>">
            議題立場
        </a>
    </li>
    <li class="<?php echo $politician_news_active; ?>">
        <a href="/politician/<?php echo $politician_obj->id; ?>/news">
            相關新聞
        </a>
    </li>
</ul>