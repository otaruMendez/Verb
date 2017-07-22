<?php


class Router
{

    public static function getRoutes()
    {
        $request = new Request($_GET, $_POST, $_COOKIE, $_FILES, $_SERVER, '');
        $url = $request->getUri();
        $urlComponents =  explode('/', $url);
        $control = 'Control' . ucfirst($urlComponents[1]);
        $actor = 'acton' . ucfirst($urlComponents[2]);
        return [$control, $actor];
    }
}