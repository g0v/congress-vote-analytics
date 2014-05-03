<div class="col-xs-18 col-sm-6 col-md-3">
    <div class="thumbnail">
        <img src="<?php echo $politician_obj->icon; ?>" alt="">
        <div class="caption">
            <h4>
                <?php echo $politician_obj->name; ?>
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