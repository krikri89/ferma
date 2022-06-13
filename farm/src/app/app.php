<?php

namespace Farm;

use Farm\Controllers\HomeController;
use Farm\Messages;

class App
{
    const DOMAIN = 'kukufarm.lt';
    private static $html;

    public static function start()
    {
        session_start();
        Messages::init();
        ob_start();
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        array_shift($uri);
        self::route($uri);
        self::$html = ob_get_contents();
        // print_r($uri);
        ob_end_clean();
    }
    public static function sent()
    {
        echo self::$html;
    }
    public static function listofAnimals(array $listofAnimals = [])
    {
        echo json_encode($listofAnimals[]);
    }

    public static function view($name)
    {
        return require __DIR__ . '/../views/' . $name . '.php';
    }

    public static function redirect($url = '')
    {
        header('Location: http://' . self::DOMAIN . '/' . $url);
    }

    public static function url($url = '')
    {
        return 'http://' . self::DOMAIN . '/' . $url;
    }

    private static function route(array $uri)
    {

        $m = $_SERVER['REQUEST_METHOD'];


        if ('GET' == $m && count($uri) == 1 && $uri[0] === 'forma') {
            return (new HomeController)->form();
        }

        if ('POST' == $m && count($uri) == 1 && $uri[0] === 'forma') {
            return (new HomeController)->doForm();
        } else {
            echo 'kita';
        }
    }
}
