<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $auth = Session()->auth;
        if($auth){
            $data['Title'] = "Profile User";
            $data['auth'] = $auth;
            return view('home_page', $data);
        } else {
            return Redirect()->to('/auth');
        }
        echo "<a href=\"/login\">login</a>";
    }
}
