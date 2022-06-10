<?php

namespace Farm\Controllers;

use Farm\App;

class HomeController
{
    public function index()
    {
        return App::view('home');
    }
}
