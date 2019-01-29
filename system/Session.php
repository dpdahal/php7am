<?php

namespace Application\system;
/**
 * Class Session
 * @package Application\system
 */
class Session
{
    /**
     * @param $key
     * @param null $value
     * @return bool|null
     */
    public static function put($key, $value = null)
    {
        if (!isset($key)) return false;
        return $_SESSION[$key] = $value;

    }

    /**
     * @param $key
     * @return bool
     */

    public static function check($key)
    {
        return isset($_SESSION[$key]);

    }

    /**
     * @param $key
     * @return bool|string
     */

    public static function get($key)
    {
        if (!isset($key)) return false;
        if (self::check($key)) {
            return $_SESSION[$key];
        }
        return '';

    }

    /**
     * @param $key
     * @return bool
     */

    public static function delete($key)
    {
        if (!isset($key)) return false;
        if (self::check($key)) {
            unset($_SESSION[$key]);
        }
        return true;

    }

    /**
     * destroy all session
     */

    public static function destroy()
    {
        session_destroy();
    }


}