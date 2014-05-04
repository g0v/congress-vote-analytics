<?php
$issue_obj = Issue::find($issue_obj->id);
$avg_pro_score = round($issue_obj->getAVGProScore());
$avg_con_score = abs(round($issue_obj->getAVGConScore()));
?>
<a class="list-group-item row">
    <div class="media col-md-3">
        <figure class="pull-left">
            <img class="media-object img-rounded img-responsive" src="<?php echo $issue_obj->icon; ?>">
        </figure>
    </div>
    <div class="col-md-9">
        <h3 class="list-group-item-heading">
            <?php echo $issue_obj->title; ?>
        </h3>
        <p class="list-group-item-text margin-top-3">
            <div class="row">
                <h4>大家對此議題的平均評分</h4>
                <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo $avg_pro_score; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $avg_pro_score; ?>%">
                        <span class="sr-only"><?php echo $avg_pro_score; ?></span>
                    </div>
                    <span class="progress-type">平均贊成分數</span>
                    <span class="progress-completed"><?php echo $avg_pro_score; ?></span>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo $avg_con_score; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $avg_con_score; ?>%">
                        <span class="sr-only"><?php echo $avg_con_score; ?></span>
                    </div>
                    <span class="progress-type">平均反對分數</span>
                    <span class="progress-completed"><?php echo $avg_con_score; ?></span>
                </div>
                <?php

                if (Auth::check()) {

                    $login_user_obj = Auth::user();

                    $user_issue_score_record_obj = DB::table('user_issue_score_records')
                                                        ->where('user_id', $login_user_obj->id)
                                                        ->where('issue_id', $issue_obj->id)
                                                        ->first();
                    $my_issue_score = 0;
                    if (!empty($user_issue_score_record_obj)) {
                        $user_issue_score_record_obj = UserIssueScoreRecord::find($user_issue_score_record_obj->id);
                        $my_issue_score = $user_issue_score_record_obj->score;
                    }

                ?>
                <div>
                    <h4>您對此議題的評分（正分為贊成，負分為反對）</h4>
                    <form class="form-horizontal" role="form" name="issue_score_form">
                        <div class="form-group">
                            <label for="icon-input" class="col-sm-2 control-label">
                                評分
                            </label>
                            <div class="col-sm-10">
                                <input type="hidden" name="issue_id" value="<?php echo $issue_obj->id ?>">
                                <input  style="width: 100%;"
                                        id="my-issue<?php echo $issue_obj->id ?>-score"
                                        name="my_issue_score"
                                        data-slider-id='glodSlider'
                                        type="text"
                                        data-slider-min="-100"
                                        data-slider-max="100"
                                        data-slider-step="1"
                                        data-slider-value="<?php echo $my_issue_score; ?>" />
                                <script>
                                $("#my-issue<?php echo $issue_obj->id ?>-score").slider({
                                    tooltip: 'always'
                                }).on('slide', function(slideEvt){
                                    $("#my-issue<?php echo $issue_obj->id ?>-score").attr('data-slider-value', slideEvt.value);
                                });

                                </script>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="button" class="btn btn-default save-issue-score-btn">儲存評分</button>
                            </div>
                        </div>
                    </form>
                </div>
                <?php
                }
                ?>
            </div>
        </p>
    </div>
</a>