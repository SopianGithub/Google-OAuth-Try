<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Google\Client as Google_Client;
use Google_Service_Oauth2; 

class Webhook extends BaseController {

	public function index()
	{
		if($json = json_decode(file_get_contents("php://input"), true)) {
		    print_r($json);
		    $data = $json;
		} else {
		    print_r($_POST);
		    $data = $_POST;
		}
		
	}

}

/* End of file Webhook.php */
/* Location: .//Applications/MAMP/htdocs/alexa/app/Controllers/Webhook.php */