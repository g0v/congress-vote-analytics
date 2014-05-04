<?php

class NewsController extends \BaseController {

    public function getNewsPage() {

        return View::make('news-page', array('active_header' => 'news-page'));

    }

	public function addNews() {

		if (Auth::check()) {

			$login_user_obj = Auth::user();

            $input = Input::all();

            $news_url_input 	= $input['news_url_input'];
            $news_icon_input 	= $input['news_icon_input'];
            $news_title_input 	= $input['news_title_input'];
            $news_content_input = $input['news_content_input'];

            // create news
            $news_obj               = new News;
            $news_obj->url         	= $news_url_input;
            $news_obj->title        = $news_title_input;
            $news_obj->content   	= $news_content_input;
            $news_obj->icon        	= $news_icon_input;
            $news_obj->creator_id   = $login_user_obj->id;
            $news_obj->save();

            $type = 'success';
            $parameter = array("none"=>"none");
            $error_messanger = new FukuPHPErrorMessenger($type, $parameter);
            $error_messanger->printErrorJSON();
            unset($error_messanger);
            return;

        } else {

            $type = 'unknow_error';
            $parameter = array("none"=>"none");
            $error_messanger = new FukuPHPErrorMessenger($type, $parameter);
            $error_messanger->printErrorJSON();
            unset($error_messanger);
            return;
        }

	}

	public function getAddNewsForm()
	{
		if (Auth::check()) {

            $input = Input::all();

            $news_url_input = $input['news_url_input'];

            $news_obj = DB::table('news')->where('url', $news_url_input)->first();

            if (!empty($news_obj)) {

            	$type = 'news_url_exist';
	            $parameter = array("none"=>"none");
	            $error_messanger = new FukuPHPErrorMessenger($type, $parameter);
	            $error_messanger->printErrorAlertBlock();
	            unset($error_messanger);
	            return;

            } else {

            	$reader = new Opengraph\Reader();
				$reader->parse(file_get_contents($news_url_input));
				$og_data = $reader->getArrayCopy();

				$og_title 		= $og_data['og:title'];
				$og_description = $og_data['og:description'];
				$og_image 		= $og_data['og:image'][0]['og:image:url'];
				$og_url 		= $og_data['og:url'];

				return View::make(
								'form.add-news-form',
								array(
									'og_title' 			=> $og_title,
									'og_description' 	=> $og_description,
									'og_image' 			=> $og_image,
									'og_url' 			=> $og_url,
								)
							);

            }

        } else {

            $type = 'unknow_error';
            $parameter = array("none"=>"none");
            $error_messanger = new FukuPHPErrorMessenger($type, $parameter);
            $error_messanger->printErrorText();
            unset($error_messanger);
            return;
        }

	}

    public function getTagNewsForm() {

        $input = Input::all();

        $news_id = $input['news_id'];

        return View::make('modal.tag-news-form', array('news_id' => $news_id));
    }

    public function tagNews() {

        if (!Auth::check()) {

            $type = 'unknow_error';
            $parameter = array("none"=>"none");
            $error_messanger = new FukuPHPErrorMessenger($type, $parameter);
            $error_messanger->printErrorJSON();
            unset($error_messanger);
            return;

        }

        $login_user_obj = Auth::user();

        $input = Input::all();

        $news_id                = $input['tag_news_id'];
        $news_issue_record      = $input['news_issue_record'];
        $news_politician_record = $input['news_politician_record'];

        DB::delete('DELETE FROM news_issue_records WHERE news_id = ?', array($news_id));
        DB::delete('DELETE FROM news_politician_records WHERE news_id = ?', array($news_id));

        $news_issue_record_array        = explode(',', $news_issue_record);
        $news_politician_record_array   = explode(',', $news_politician_record);

        foreach ($news_issue_record_array as $key=>$issue_id) {
            $news_issue_record_obj              = new NewsIssueRecord;
            $news_issue_record_obj->news_id     = $news_id;
            $news_issue_record_obj->issue_id    = $issue_id;
            $news_issue_record_obj->creator_id  = $login_user_obj->id;
            $news_issue_record_obj->save();
        }

        foreach ($news_politician_record_array as $key=>$politician_id) {
            $news_politician_record_obj                 = new NewsPoliticianRecord;
            $news_politician_record_obj->news_id        = $news_id;
            $news_politician_record_obj->politician_id  = $politician_id;
            $news_politician_record_obj->creator_id     = $login_user_obj->id;
            $news_politician_record_obj->save();
        }

        $type = 'success';
        $parameter = array("none"=>"none");
        $error_messanger = new FukuPHPErrorMessenger($type, $parameter);
        $error_messanger->printErrorJSON();
        unset($error_messanger);
        return;

    }


}
