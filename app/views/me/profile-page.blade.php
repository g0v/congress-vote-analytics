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
        <?php
        } else {

            echo View::make('partials.login-link-alert');

        }
        ?>
    </section>
@stop
