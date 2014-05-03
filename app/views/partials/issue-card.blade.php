<a href="#" class="list-group-item">
    <div class="media col-md-3">
        <figure class="pull-left">
            <img class="media-object img-rounded img-responsive" src="<?php echo $issue_obj->icon; ?>">
        </figure>
    </div>
    <div class="col-md-6">
        <h3 class="list-group-item-heading">
            <?php echo $issue_obj->title; ?>
        </h3>
        <p class="list-group-item-text margin-top-3">
            <div class="row">
                <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                        <span class="sr-only">80%</span>
                    </div>
                    <span class="progress-type">平均贊成分數</span>
                    <span class="progress-completed">80%</span>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                        <span class="sr-only">20%</span>
                    </div>
                    <span class="progress-type">平均反對分數</span>
                    <span class="progress-completed">20%</span>
                </div>
                <?php
                if (Auth::check()) {
                ?>
                <div>
                    <h4>您對此議題的評分</h4>
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="icon-input" class="col-sm-2 control-label">
                                贊成分數
                            </label>
                            <div class="col-sm-10">
                                <input style="width: 100%;" id="pro-issue<?php echo $issue_obj->id ?>-rank" data-slider-id='greenSlider' type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="50"/>
                                <script>
                                $("#pro-issue<?php echo $issue_obj->id ?>-rank").slider({
                                    tooltip: 'always'
                                });
                                </script>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="icon-input" class="col-sm-2 control-label">
                                反對分數
                            </label>
                            <div class="col-sm-10">
                                <input style="width: 100%;" id="con-issue<?php echo $issue_obj->id ?>-rank" data-slider-id='redSlider' type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="50"/>
                                <script>
                                $("#con-issue<?php echo $issue_obj->id ?>-rank").slider({
                                    tooltip: 'always'
                                });
                                </script>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="button" class="btn btn-default">儲存評分</button>
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
    <div class="col-md-3">
        <h4>相關政治人物</h4>
        <h4>相關新聞</h4>
    </div>
</a>