<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getIndexPage()
	{
		return View::make('index-page', array('active_header' => 'no-active'));
	}

	public function getLoginPage()
	{

        // get data from input
        $code = Input::get('code');
        // get fb service
        $fb = OAuth::consumer('Facebook');

        // check if code is valid

        // if code is provided get user data and sign in
        if (!empty($code)) {

            // This was a callback request from facebook, get the token
            $token = $fb->requestAccessToken($code);

            // Send a request with it
            $result = json_decode($fb->request('/me'), true);

            $facebook_user_id   = $result['id'];
            $user_name          = $result['name'];
            $user_email         = $result['email'];
            $user_avatar_url    = "http://graph.facebook.com/".$facebook_user_id."/picture?type=large";
            $user_intro         = $result['bio'];

            $user_obj = User::where('email', '=', $user_email)->first();

            if (empty($user_obj)) {

                // create user
                $user_obj               = new User;
                $user_obj->name         = $user_name;
                $user_obj->email        = $user_email;
                $user_obj->avatar_url   = $user_avatar_url;
                $user_obj->intro        = $user_intro;
                $user_obj->save();

                $user_id = $user_obj->id;

                $user_facebook_account_obj = new UserFacebookAccount;
                $user_facebook_account_obj->facebook_id = $facebook_user_id;
                $user_facebook_account_obj->user_id = $user_id;
                $user_facebook_account_obj->save();

            }

            Auth::login($user_obj);

            return Redirect::to('/');


        } else {

            // get fb authorization
            $url = $fb->getAuthorizationUri();

            // return to facebook login url
            return Redirect::to((string)$url);

        }


	}

    public function getLogoutPage() {

        Auth::logout();

        return Redirect::to('/');

    }

    public function getIssuePage() {

        return View::make('issue-page', array('active_header' => 'issue-page'));

    }

    public function getPoliticianPage() {

        return View::make('politician-page', array('active_header' => 'politician-page'));

    }

    public function getNewsPage() {

        return View::make('news-page', array('active_header' => 'news-page'));

    }

    public function getLoginForm() {

        return View::make('modal.login-form');

    }

}
