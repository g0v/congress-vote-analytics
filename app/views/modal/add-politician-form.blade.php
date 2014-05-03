<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">
                新增政治人物
            </h4>
        </div>
        <form class="form-horizontal" role="form" id="add-politician-form" name="add_politician_form" method="post" action="/politician/add-politician">
            <div class="modal-body">
                <div class="form-group">
                    <label for="name-input" class="col-sm-2 control-label">
                        政治人物姓名
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name-input" name="name_input" placeholder="輸入政治人物姓名...">
                    </div>
                </div>
                <div class="form-group">
                    <label for="icon-input" class="col-sm-2 control-label">
                        頭像圖片連結
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="icon-input" name="icon_input" placeholder="http://...">
                    </div>
                </div>
                <div class="form-group">
                    <label for="intro-input" class="col-sm-2 control-label">
                        政治人物簡介
                    </label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="5" id="intro-input" name="intro_input"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="district-input" class="col-sm-2 control-label">
                        政治人物選區
                    </label>
                    <div class="col-sm-10">
                        <select class="form-control" id="district-input" name="district_input">
                            <?php
                            $districts = DB::table('districts')
                                                ->orderBy('order', 'asc')
                                                ->get();
                            foreach ($districts as $districts_obj) {

                            ?>
                            <option value="<?php echo $districts_obj->id; ?>" ><?php echo $districts_obj->title."：".$districts_obj->description; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="add-politician-form-submit" class="btn btn-default">新增</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </form>
    </div>
</div>
<script>
$(document).ready(function() {

    $('#modal-block').modal('show');

    $('#modal-block').on('hidden', function () {

        $('#modal-block').empty();

    });

    function addPoliticianValidate(formData, jqForm, options) {

        var is_validated = true;

        if (!$('#name-input').val()) {
            $('#name-input').parent().addClass('has-error');
            is_validated = false;
        } else {
            $('#name-input').parent().removeClass('has-error');
        }

        if(!$('#icon-input').val()){
            $('#icon-input').parent().addClass('has-error');
            is_validated = false;
        } else {
            $('#icon-input').parent().removeClass('has-error');
        }

        if(!$('#intro-input').val()){
            $('#intro-input').parent().addClass('has-error');
            is_validated = false;
        } else {
            $('#intro-input').parent().removeClass('has-error');
        }

        if (is_validated) {

            $('#add-politician-form-submit').attr("disabled", "disabled");
            $('#system-message').html('處理中...');
            $('#system-message').show();

        }

        return is_validated;

    }

    function addPoliticianResponse(responseText, statusText, xhr, $form)  {

        if (responseText.response.status.code==0) {
            // reload or redirect to some page

            $('#system-message').html('成功');
            $('#system-message').fadeOut();
            window.location.reload();

        } else {

            $('#add-politician-form-submit').removeAttr("disabled");

            $('#system-message').html('失敗，請重新操作');
            $('#system-message').fadeOut();

        }

    }


    $('#add-politician-form').ajaxForm({
        beforeSubmit:   addPoliticianValidate,
        success:        addPoliticianResponse,
        url:            '/politician/add-politician',
        type:           'post',
        dataType:       'json'
    });

});
</script>