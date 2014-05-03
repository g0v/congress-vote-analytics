<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <img src="<?php echo $og_image; ?>" class="img-thumbnail" style="width:100%;">
    </div>
    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
        <form id="add-news-form" name="add_news_form" role="form" method="post" action="/news/add-news">
            <input type="hidden" name="news_url_input" value="<?php echo $og_url; ?>">
            <input type="hidden" name="news_icon_input" value="<?php echo $og_image; ?>">
            <div class="form-group">
                <label for="news-title-input">
                    新聞標題
                </label>
                <input type="text" name="news_title_input" class="form-control" id="news-title-input" value="<?php echo $og_title; ?>">
            </div>
            <div class="form-group">
                <label for="news-content-input">
                    新聞內容
                </label>
                <textarea name="news_content_input" class="form-control" id="news-content-input" rows="8"><?php echo $og_description; ?></textarea>
            </div>
            <button id="add-news-submit" type="submit" class="btn btn-primary">
                新增
            </button>
        </form>
    </div>
</div>
<script>
$(document).ready(function() {

    function addNewsValidate(formData, jqForm, options) {

        var is_validated = true;

        if (!$('#news-title-input').val()) {
            $('#news-title-input').parent().addClass('has-error');
            is_validated = false;
        } else {
            $('#news-title-input').parent().removeClass('has-error');
        }

        if (!$('#news-content-input').val()) {
            $('#news-content-input').parent().addClass('has-error');
            is_validated = false;
        } else {
            $('#news-content-input').parent().removeClass('has-error');
        }

        if (is_validated) {

            $('#add-news-submit').attr("disabled", "disabled");
            $('#system-message').html('處理中...');
            $('#system-message').show();

        }

        return is_validated;

    }

    function addNewsResponse(responseText, statusText, xhr, $form)  {

        if (responseText.response.status.code==0) {
            // reload or redirect to some page

            $('#system-message').html('成功');
            $('#system-message').fadeOut();
            window.location.reload();

        } else {


            $('#add-news-submit').removeAttr("disabled");
            $('#system-message').html('失敗，請重新操作');
            $('#system-message').fadeOut();

        }


    }


    $('#add-news-form').ajaxForm({
        beforeSubmit:   addNewsValidate,
        success:        addNewsResponse,
        url:            '/news/add-news',
        type:           'post',
        dataType:       'json'
    });

});
</script>