<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">註冊/登入</h4>
        </div>
        <div class="modal-body">
            <div class="text-center">
                <a class="btn btn-primary btn-lg" href="/login">
                    使用 Facebook 註冊/登入
                </a>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {

    $('#modal-block').modal('show');

    $('#modal-block').on('hidden', function () {

        $('#modal-block').empty();

    });

});
</script>