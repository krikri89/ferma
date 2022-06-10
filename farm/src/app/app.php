<?php

namespace Farm;

use Farm\Controllers\HomeController;

class App
{
    public static function start()
    {
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        array_shift($uri);
        self::route($uri);
        print_r($uri);
        echo 'sheep';
    }

    public static function view($name)
    {
        return require __DIR__ . '/../views/' . $name . '.php';
    }
    private static function route(array $uri)
    {
        $m = $_SERVER['REQUEST_METHOD'];
        if (count($uri) == 1 && $uri[0] === '') {
            return (new Homecontroller)->index();
        }
        if ('GET' == $m && count($uri) == 1 && $uri[0] === 'forma') {
            return (new HomeController)->form();
        } else {
            echo 'kita';
        }
    }
}
