<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">
                新增議題
            </h4>
        </div>
        <form class="form-horizontal" role="form" id="add-issue-form" name="add_issue_form" method="post" action="/issue/add-issue">
            <div class="modal-body">
                <div class="form-group">
                    <label for="title-input" class="col-sm-2 control-label">
                        議題名稱
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title-input" name="title_input" placeholder="輸入議題名稱...">
                    </div>
                </div>
                <div class="form-group">
                    <label for="icon-input" class="col-sm-2 control-label">
                        議題圖片連結
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="icon-input" name="icon_input" placeholder="http://...">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="add-issue-form-submit" class="btn btn-default">新增</button>
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

    function addIssueValidate(formData, jqForm, options) {

        var is_validated = true;

        if (!$('#title-input').val()) {
            $('#title-input').parent().addClass('has-error');
            is_validated = false;
        } else {
            $('#title-input').parent().removeClass('has-error');
        }

        if(!$('#icon-input').val()){
            $('#icon-input').parent().addClass('has-error');
            is_validated = false;
        } else {
            $('#icon-input').parent().removeClass('has-error');
        }

        if (is_validated) {

            $('#add-issue-form-submit').attr("disabled", "disabled");
            $('#system-message').html('處理中...');
            $('#system-message').show();

        }

        return is_validated;

    }

    function addIssueResponse(responseText, statusText, xhr, $form)  {

        if (responseText.response.status.code==0) {
            // reload or redirect to some page

            $('#system-message').html('成功');
            $('#system-message').fadeOut();
            window.location.reload();

        } else {

            $('#add-issue-form-submit').removeAttr("disabled");

            $('#system-message').html('失敗，請重新操作');
            $('#system-message').fadeOut();

        }

    }


    $('#add-issue-form').ajaxForm({
        beforeSubmit:   addIssueValidate,
        success:        addIssueResponse,
        url:            '/issue/add-issue',
        type:           'post',
        dataType:       'json'
    });

});
</script>