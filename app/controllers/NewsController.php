<?php

class NewsController extends \BaseController {

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

        } else {

            $type = 'unknow_error';
            $parameter = array("none"=>"none");
            $error_messanger = new FukuPHPErrorMessenger($type, $parameter);
            $error_messanger->printErrorText();
            unset($error_messanger);
            return;
        }

	}


}
