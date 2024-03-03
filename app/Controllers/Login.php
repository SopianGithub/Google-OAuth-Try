<?php

namespace App\Controllers;

use Google\Client as Google_Client;
use Google\Auth\OAuth2 as OAuth2;
use Google_Service_Oauth2; 
use App\Models\Users;
use App\Models\UsersGroups;

class Login extends BaseController {

	public function index()
	{
		$clientID = '16563605368-hn35urrqb0g37p5hjbfjtcach36a0aqo.apps.googleusercontent.com';
		$clientSecret = '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';
		$redirectUri = 'http://localhost:8888/alexa/public/login'; //Must Be Same Of Value Reegsited on Google OAuth
				
		$client = new Google_Client();
		$client->setClientId($clientID);
		$client->setClientSecret($clientSecret);
		$client->setRedirectUri($redirectUri);
		// $str=rand();
		// $state = sha1($str);
		// $client->setState($state);
		$client->addScope("email");
		$client->addScope("profile");

		if (isset($_GET['code'])) {
			$token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

			echo "<pre>";
			print_r ($_GET);
			echo "</pre>";


			echo "<pre>";
			print_r ($token);
			echo "</pre>";

			$client->setAccessToken($token['access_token']);							
			$Oauth = new Google_Service_Oauth2($client);


			echo "<pre>";
			print_r ($Oauth);
			echo "</pre>";


			echo "<pre>";
			print_r ($client);
			echo "</pre>";
			exit();

			// return redirect()->to('https://oauth-redirect.googleusercontent.com/r/testoauth-18027?code='.$_GET['code'].'&state='.$state);

			// $array = array(
			// 	'token' => $token
			// );
			// $this->session->set_userdata( $array );

			if(isset($token['access_token'])){
				$client->setAccessToken($token['access_token']);							
				$Oauth = new Google_Service_Oauth2($client);
				$userInfo = $Oauth->userinfo->get();
				$users = new Users();
				$data = $users->where('google_id',$userInfo->id)->find();
				if(! $data){
					if($users->insert([
						'google_id' => $userInfo->id,
						'email' => $userInfo->email,
						'name' => $userInfo->name,
						'picture' => $userInfo->picture
					])){
						$userInfo->group = 1;
		                $userInfo->id = $data[0]['id'];
						Session()->auth = $userInfo;
						$this->session->set('token',$token['access_token']);
						return redirect()->to('/');
					}
				    return redirect()->back();
				}
				// $groups = new UsersGroups();
				// $group = $groups->where('user_id',$data[0]['id'])->find();
				// $userInfo->group_id = $group[0]['group_id'];
				// $userInfo->id = $data[0]['id']; 
				Session()->auth = $userInfo;
				return redirect()->to('/');
			}
		} 
		$auth = Session()->auth;
		if($auth){
			return redirect()->to('/');
		}

		$data['client'] = $client;

		return view('login_page', $data);
		// echo "<a href='".$client->createAuthUrl()."'>Google Login</a>";

	}

	public function auth()
	{
		$clientID = '16563605368-hn35urrqb0g37p5hjbfjtcach36a0aqo.apps.googleusercontent.com';
		$clientSecret = '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';
		$redirectUri = 'http://localhost:8888/alexa/public/login';

		$client = new OAuth2([
			'authorizationUri' => $redirectUri,
			'tokenCredentialUri' => $redirectUri,
			'redirectUri' => 'https://oauth-redirect.googleusercontent.com/r/smarthomeoauth-15780',
			'clientId' => $clientID,
			'clientSecret' => $clientSecret,
			'scope' => ['email', 'profile']
		]);

		$res = $client->buildFullAuthorizationUri();

		echo "<pre>";
		print_r ($res);
		echo "</pre>";	
	}

	public function logout()
	{
		
		Session()->destroy();
		return Redirect()->to('/login');
	
	}

	public function token()
	{
		$clientID = '16563605368-hn35urrqb0g37p5hjbfjtcach36a0aqo.apps.googleusercontent.com';
		$clientSecret = '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';
		$redirectUri = 'http://localhost:8888/alexa/public/login';

		$client = new OAuth2([
			'authorizationUri' => $redirectUri,
			'tokenCredentialUri' => $redirectUri,
			'redirectUri' => 'https://oauth-redirect.googleusercontent.com/r/smarthomeoauth-15780',
			'clientId' => $clientID,
			'clientSecret' => $clientSecret,
			'scope' => ['email', 'profile']
		]);

		$client->setGrantType('authorization_code');
		$client->setCode($_GET['code']);
		$client->setAccessToken('ya29.a0AfB_byB92oBJOU7fD2efI72nPTIBDYWzekFYhYy6a1aJznmIhukfh8VHt368gmfd_ZeG2zeiv1eTDh3B3dSx75t5pp8Q5S_smsSyKlsfxZSqNstcuK6VcHy5zHNuj-su0jLPNIGajZo6dKEXiXrk1SWKINGPqYT8bCPnaCgYKAYQSAQ4SFQHGX2MiByjJ6v7g021V8rQKPJYEIw0171');
		$req = $client->generateCredentialsRequest();

		// $res = $client->fetchAuthToken();

		echo "<pre>";
		print_r ($req);
		echo "</pre>";
	}

	public function wb()
	{
		// code...
	}

}

/* End of file Logout.php */
/* Location: .//Applications/MAMP/htdocs/alexa/app/Controllers/Login.php */