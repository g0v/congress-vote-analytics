function get_login_form() {

    $.ajax({
        url: '/get-login-form',
        type: "GET",
        data: {},
        dataType: "html",
        beforeSend: function( xhr ) {
            $('#system-message').html('處理中...');
            $('#system-message').show();
        },
        success: function( html_block ) {
            $('#system-message').html('完成');
            $('#system-message').fadeOut();
            $('#modal-block').html(html_block);
        }
    });

}

$(document).ready(function() {

    $(document.body).off('click', '.login-link');
    $(document.body).on('click', '.login-link', function() {
        get_login_form();
    });

    $(document.body).off('click', '.save-issue-score-btn');
    $(document.body).on('click', '.save-issue-score-btn', function() {

        var issue_score_form_element = $(this).parent().parent().parent();
        var issue_score = issue_score_form_element.find('input[name="my_issue_score"]').attr('data-slider-value');
        var issue_id = issue_score_form_element.find('input[name="issue_id"]').val();

        $.ajax({
            url: '/me/update-issue-score',
            type: "POST",
            data: {
                issue_id : issue_id,
                issue_score : issue_score
            },
            dataType: "json",
            beforeSend: function( xhr ) {
                $('#system-message').html('處理中...');
                $('#system-message').show();
            },
            success: function( json_data ) {

                if (json_data.response.status.code==0) {

                    $('#system-message').html('完成');
                    $('#system-message').fadeOut();

                } else {

                    $('#system-message').html('失敗，請重新操作');
                    $('#system-message').fadeOut();

                }
            }
        });

    });

    $(document.body).off('click', '.save-politician-issue-score-btn');
    $(document.body).on('click', '.save-politician-issue-score-btn', function() {

        var politician_issue_score_form_element = $(this).parent().parent().parent();
        var politician_issue_score = politician_issue_score_form_element.find('input[name="my_politician_issue_score"]').attr('data-slider-value');
        var issue_id = politician_issue_score_form_element.find('input[name="issue_id"]').val();
        var politician_id = politician_issue_score_form_element.find('input[name="politician_id"]').val();

        $.ajax({
            url: '/me/update-politician-issue-score',
            type: "POST",
            data: {
                issue_id : issue_id,
                politician_id : politician_id,
                politician_issue_score : politician_issue_score
            },
            dataType: "json",
            beforeSend: function( xhr ) {
                $('#system-message').html('處理中...');
                $('#system-message').show();
            },
            success: function( json_data ) {

                if (json_data.response.status.code==0) {

                    $('#system-message').html('完成');
                    $('#system-message').fadeOut();

                } else {

                    $('#system-message').html('失敗，請重新操作');
                    $('#system-message').fadeOut();

                }
            }
        });

    });

    $(document.body).off('click', '.tag-news-btn');
    $(document.body).on('click', '.tag-news-btn', function() {
        $.ajax({
            url: '/news/get-tag-news-form',
            type: "GET",
            data: {
                news_id: $(this).attr('data-news-id')
            },
            dataType: "html",
            beforeSend: function( xhr ) {
                $('#system-message').html('處理中...');
                $('#system-message').show();
            },
            success: function( html_block ) {
                $('#system-message').html('完成');
                $('#system-message').fadeOut();
                $('#modal-block').html(html_block);
            }
        });
    });

    $(document.body).off('click', '.to-issue-profile-btn');
    $(document.body).on('click', '.to-issue-profile-btn', function() {

        window.location.href = $(this).attr('data-url');

    });

});