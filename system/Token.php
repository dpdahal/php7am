<?php


namespace Application\system;


class Token
{

    public static function generate()
    {
        return Session::put('csrf', md5(microtime()));
    }

    public static function check($hashValue = null)
    {
        if (Session::get('csrf') == $hashValue) {
            Session::delete('csrf');
            return true;
        }

        return false;

    }

    public static function csrf()
    {

        return "<input type='hidden' name='_token' value='" . self::generate() . "'>";

    }

}