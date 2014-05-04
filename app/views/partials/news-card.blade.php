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
            <p class="text-right">
                <a href="<?php echo $news_obj->url; ?>" target="_blank">
                    新聞原文連結
                </a>
            </p>
            <?php
            if (Auth::check()) {
            ?>
            <p>
                <button class="btn btn-info btn-block tag-news-btn" data-news-id="<?php echo $news_obj->id; ?>" role="button">
                    標示相關新聞
                </button>
            </p>
            <?php
            }
            ?>
        </div>
    </div>
</div>