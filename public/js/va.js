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

});