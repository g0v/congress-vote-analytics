<div class="col-xs-18 col-sm-6 col-md-3">
    <div class="thumbnail">
        <a href="/politician/<?php echo $politician_obj->id; ?>">
            <img src="<?php echo $politician_obj->icon; ?>" alt="">
        </a>
        <div class="caption">
            <h4>
                <a href="/politician/<?php echo $politician_obj->id; ?>">
                    <?php echo $politician_obj->name; ?>
                </a>
            </h4>
            <h4>
                <?php
                $district_obj = District::find($politician_obj->district_id);
                echo $district_obj->title;
                ?>
            </h4>
            <p>
                <?php echo Helper::shortString($politician_obj->intro, 140); ?>
            </p>
        </div>
    </div>
</div>