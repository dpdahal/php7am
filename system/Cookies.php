<?php

namespace Application\System;

/**
 * Class Cookie
 * @package Application\System
 */
class Cookies
{

    public static function set($key, $value, $interval)
    {

        return setcookie($key, $value, $interval);
    }


    public static function get($key)
    {
        if (!self::exists($key)) return '';
        return $_COOKIE[$key];
    }

    public static function exists($key)
    {
        return isset($_COOKIE[$key]);
    }


    public static function delete($key)
    {
        setcookie($key, '', -1, '/');
        return true;
    }

}