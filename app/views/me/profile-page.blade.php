@extends('layout')

@section('content')
    <section>
        <?php
        if (Auth::check()) {

            $login_user_obj = Auth::user();
        ?>
        <div class="span3 well">
            <center>
                <img src="<?php echo $login_user_obj->avatar_url; ?>" name="aboutme" width="140" height="140" class="img-circle">
                <h3><?php echo $login_user_obj->name; ?></h3>
                <em><?php echo nl2br($login_user_obj->intro); ?></em>
            </center>
        </div>
        <form class="form-horizontal" role="form" id="update-profile-form" name="update_profile_form" method="post" action="/me/update-profile">
            <div class="form-group">
                <label for="email-input" class="col-sm-1 control-label">
                    Email
                </label>
                <div class="col-sm-11">
                    <input type="email" class="form-control" id="email-input" name="email_input" placeholder="輸入 Email..." value="<?php echo $login_user_obj->email; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="name-input" class="col-sm-1 control-label">
                    姓名
                </label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" id="name-input" name="name_input" placeholder="輸入姓名..." value="<?php echo $login_user_obj->name; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="intro-input" class="col-sm-1 control-label">
                    簡介
                </label>
                <div class="col-sm-11">
                    <textarea class="form-control" rows="10" id="intro-input" name="intro_input"><?php echo $login_user_obj->intro; ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="district-input" class="col-sm-1 control-label">
                    選區
                </label>
                <div class="col-sm-11">
                    <select class="form-control" id="district-input" name="district_input">
                        <?php
                        $districts = DB::table('districts')
                                            ->orderBy('order', 'asc')
                                            ->get();
                        foreach ($districts as $districts_obj) {

                            $selected = '';
                            if ($districts_obj->id==$login_user_obj->district_id) {
                                $selected = 'selected';
                            }
                        ?>
                        <option value="<?php echo $districts_obj->id; ?>" <?php echo $selected; ?>><?php echo $districts_obj->title."：".$districts_obj->description; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-1 col-sm-11">
                    <button type="submit" id="update-profile-form-submit" class="btn btn-default">更新資料</button>
                </div>
            </div>
        </form>
        <script>
        $(document).ready(function() {

            function updateProfileValidate(formData, jqForm, options) {

                var is_validated = true;

                if (!$('#email-input').val()) {
                    $('#email-input').parent().addClass('has-error');
                    is_validated = false;
                } else {
                    $('#email-input').parent().removeClass('has-error');
                }

                if(!$('#name-input').val()){
                    $('#name-input').parent().addClass('has-error');
                    is_validated = false;
                } else {
                    $('#name-input').parent().removeClass('has-error');
                }

                if(!$('#intro-input').val()){
                    $('#intro-input').parent().addClass('has-error');
                    is_validated = false;
                } else {
                    $('#intro-input').parent().removeClass('has-error');
                }

                if (is_validated) {

                    $('#update-profile-form-submit').attr("disabled", "disabled");
                    $('#system-message').html('處理中...');
                    $('#system-message').show();

                }

                return is_validated;

            }

            function updateProfileResponse(responseText, statusText, xhr, $form)  {

                if (responseText.response.status.code==0) {
                    // reload or redirect to some page

                    $('#system-message').html('成功');
                    $('#system-message').fadeOut();
                    window.location.reload();

                } else {

                    $('#update-profile-form-submit').removeAttr("disabled");

                    $('#system-message').html('失敗，請重新操作');
                    $('#system-message').fadeOut();

                }

            }


            $('#update-profile-form').ajaxForm({
                beforeSubmit:   updateProfileValidate,
                success:        updateProfileResponse,
                url:            '/me/update-profile',
                type:           'post',
                dataType:       'json'
            });

        });
        </script>
        <?php
        } else {

            echo View::make('partials.login-link-alert');

        }
        ?>
    </section>
@stop
