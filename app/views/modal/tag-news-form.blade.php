<?php
if (Auth::check()) {

    $login_user_obj = Auth::user();
?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">
                標示相關新聞
            </h4>
        </div>
        <form class="form-horizontal" role="form" id="tag-news-form" name="tag_news_form" method="post" action="/news/tag-news">
            <input type="hidden" name="tag_news_id" value="<?php echo $news_id; ?>" />
            <div class="modal-body">
                <div class="form-group">
                    <label for="news-issue-record" class="col-sm-2 control-label">
                        新聞相關議題
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="news-issue-record" name="news_issue_record" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="news-politician-record" class="col-sm-2 control-label">
                        新聞相關政治人物
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="news-politician-record" name="news_politician_record" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="tag-news-form-submit" class="btn btn-default">
                    儲存
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    取消
                </button>
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

    $("#news-issue-record").tokenInput("/api/search/issue", {
        zindex: 20999,
        hintText: "請輸入議題名稱以搜尋...",
        noResultsText: "沒有任何相關議題",
        searchingText: "搜尋中...",
        minChars: 1,
        preventDuplicates: true,
        allowFreeTagging: false,
        theme: "facebook",
        prePopulate: [
            <?php

            $issue_list = DB::select('SELECT i.id, i.title '.
                                        'FROM news_issue_records nir '.
                                        'INNER JOIN issues i '.
                                        'ON (nir.issue_id=i.id) '.
                                        'WHERE nir.news_id = ? '.
                                        'GROUP BY i.id ORDER BY i.id', array($news_id));

            foreach ($issue_list as $issue_obj) {

            ?>
            {
                id:<?php echo $issue_obj->id; ?>,
                name:"<?php echo $issue_obj->title; ?>"
            },
            <?php

            }

            ?>
        ]
    });

    $("#news-politician-record").tokenInput("/api/search/politician", {
        zindex: 20999,
        hintText: "請輸入政治人物姓名以搜尋...",
        noResultsText: "沒有任何相關政治人物",
        searchingText: "搜尋中...",
        minChars: 1,
        preventDuplicates: true,
        allowFreeTagging: false,
        theme: "facebook",
        prePopulate: [
            <?php

            $politician_list = DB::select('SELECT p.id, p.name '.
                                        'FROM news_politician_records npr '.
                                        'INNER JOIN politicians p '.
                                        'ON (npr.politician_id=p.id) '.
                                        'WHERE npr.news_id = ? '.
                                        'GROUP BY p.id ORDER BY p.id', array($news_id));

            foreach ($politician_list as $politician_obj) {

            ?>
            {
                id:<?php echo $politician_obj->id; ?>,
                name:"<?php echo $politician_obj->name; ?>"
            },
            <?php

            }

            ?>

        ]
    });

    function tagNewsValidate(formData, jqForm, options) {

        var is_validated = true;

        if (!$('#news-issue-record').val()) {
            $('#news-issue-record').parent().addClass('has-error');
            is_validated = false;
        } else {
            $('#news-issue-record').parent().removeClass('has-error');
        }

        if(!$('#news-politician-record').val()){
            $('#news-politician-record').parent().addClass('has-error');
            is_validated = false;
        } else {
            $('#news-politician-record').parent().removeClass('has-error');
        }

        if (is_validated) {

            $('#tag-news-form-submit').attr("disabled", "disabled");
            $('#system-message').html('處理中...');
            $('#system-message').show();

        }

        return is_validated;

    }

    function tagNewsResponse(responseText, statusText, xhr, $form)  {

        if (responseText.response.status.code==0) {
            // reload or redirect to some page

            $('#system-message').html('成功');
            $('#system-message').fadeOut();
            $('#modal-block').modal('hide');

        } else {

            $('#tag-news-form-submit').removeAttr("disabled");

            $('#system-message').html('失敗，請重新操作');
            $('#system-message').fadeOut();

        }

    }


    $('#tag-news-form').ajaxForm({
        beforeSubmit:   tagNewsValidate,
        success:        tagNewsResponse,
        url:            '/news/tag-news',
        type:           'post',
        dataType:       'json'
    });

});
</script>
<?php
}
?>