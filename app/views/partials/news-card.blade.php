<div class="col-xs-18 col-sm-6 col-md-3">
    <div class="thumbnail">
        <img src="<?php echo $news_obj->icon; ?>" alt="">
        <div class="caption">
            <h4>
                <?php echo $news_obj->title; ?>
            </h4>
            <p>
                <?php echo Helper::shortString($news_obj->content, 140); ?>
            </p>
            <p>
                <a href="<?php echo $news_obj->url; ?>" class="btn btn-info btn-xs" role="button" target="_blank">
                    新聞原文連結
                </a>
            </p>
        </div>
    </div>
</div>