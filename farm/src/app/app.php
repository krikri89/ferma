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
        // $uri = str_replace('kukufarm/', '', $_SERVER['REQUEST_URI']);
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        array_shift($uri);
        self::route($uri);
        self::$html = ob_get_contents();
        ob_end_clean();
    }
    public static function sent()
    {
        echo self::$html;
    }

    public static function view(string $name, array $data = [])
    {
        extract($data);
        return require __DIR__ . './views/' . $name . '.php';
    }

    public static function redirect(string $name)
    {
        header('Location: http://' . self::DOMAIN . '/' . $name);
    }

    private static function route(array $uri)
    {

        $m = $_SERVER['REQUEST_METHOD'];

        if ('GET' == $m && count($uri) == 1 && $uri[0] === '') {
            return (new HomeController)->index();
        }

        if ('POST' == $m && count($uri) == 1 && $uri[0] === '') {
            return (new HomeController)->keep();
        }
        if ('GET' == $m && count($uri) == 1 && $uri[0] === 'list') {
            return (new HomeController)->list();
        }
        if ('POST' == $m && count($uri) == 2 && $uri[0] === 'delete') {
            return (new HomeController)->deleteAccount($uri[1]);
        }
        if ('GET' == $m && count($uri) == 2 && $uri[0] === 'edit') {
            return (new HomeController)->toAdd($uri[1]);
        }
        if ('POST' == $m && count($uri) == 2 && $uri[0] === 'edit') {
            return (new HomeController)->Add($uri[1]);
        }
    }
}
