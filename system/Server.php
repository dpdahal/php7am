<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 12/23/2018
 * Time: 7:31 AM
 */

namespace Application\system;

/**
 * Class Server
 * @package Application\system
 */
class Server
{
    /**
     * @return mixed|string|string[]|null
     */
    public static function url()
    {
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $url = preg_replace('/[?].*/', '', $url);
        $url = trim($url, '/');
        if (empty($url)) {
            $url .= '/';
        }

        return $url;
    }

}