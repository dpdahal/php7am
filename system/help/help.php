<?php

use Carbon\Carbon;

/**
 * root path
 */

if (!function_exists('root_path')) {
    function root_path($path = '')
    {
        $path = trim($path, '/');
        $path .= "/";
        $path = rtrim($path, '/');
        if (empty($path)) {
            return dirname(dirname(dirname(__FILE__)));
        }
        $dir = dirname(dirname(dirname(__FILE__)));
        return $dir . '/' . $path;
    }

}
if (!function_exists('url')) {
    function url(string $path = '')
    {
        $getHost = \Application\system\Config::get('env.host');
        $url = trim($path, '/');
        $getHost .= '/' . $url;
        return $getHost;


    }
}

if (!function_exists('admin_url')) {
    /**
     * @param string $path
     * @return array|bool|mixed|string|null
     */
    function admin_url(string $path = '')
    {
        $getHost = \Application\system\Config::get('env.host');
        $url = trim($path, '/');
        $getHost .= '/admin/' . $url;
        return $getHost;


    }
}


if (!function_exists('view')) {
    function view($path, $data = array())
    {
        $path = str_replace('.php', '', $path);
        $path .= '.php';
        extract($data);
//        unset($data);
        if (!file_exists(root_path('view/' . $path))) throw new PDOException('Page not found ');
        require_once root_path('view/' . $path);
        return true;


    }
}

if (!function_exists('redirect')) {
    function redirect()
    {
        $redirectPath = new \Application\system\Redirect();

        return $redirectPath;

    }
}

if (!function_exists('_token')) {
    function _token()
    {
        $token = \Application\system\Token::csrf();
        return $token;

    }
}


/**
 * Message show
 */
if (!function_exists("message")) {
    function message()
    {
        if (isset($_SESSION['success'])) {
            $class = "alert alert-success";
            $message = $_SESSION['success'];
            unset($_SESSION['success']);

        }
        if (isset($_SESSION['error'])) {
            $class = "alert alert-danger";
            $message = $_SESSION['error'];
            unset($_SESSION['error']);

        }
        $outPut = '';

        if (isset($message)) {
            $outPut .= "<div class='{$class}'>";
            $outPut .= $message;
            $outPut .= "</div>";
        }

        return $outPut;
    }
}

if (!function_exists('dd')) {
    function dd($data = '')
    {
        if (empty($data)) return false;
        echo "<pre>";
        var_dump($data);
        echo "</pre>";

        return true;
    }

}
if (!function_exists('pr')) {
    function pr($data = '')
    {
        if (empty($data)) return false;
        echo "<pre>";
        print_r($data);
        echo "</pre>";

        return true;
    }

}


if (!function_exists('diffForHumans')) {

    function diffForHumans($dateTime)
    {
        if (empty($dateTime)) throw new PDOException("date time is required");

        return Carbon::createFromDate($dateTime)->diffForHumans();

    }
}


if (!function_exists('errorMessages')) {
    function errorMessage()
    {
        $errorMessage = \Application\system\Session::get('errorsMessages');

        if (!empty($errorMessage)) {
            $outPut = '';
            foreach ($errorMessage as $message) {
                $outPut .= "<div class='alert alert-danger'>";
                $outPut .= $message;
                $outPut .= "</div>";
            }

            if (isset($errorMessage)) {
                \Application\system\Session::delete('errorsMessages');

                return $outPut;
            }
        }

        return false;
    }
}


if (!function_exists('string_hash')) {
    function string_hash()
    {

        return md5('admin' . microtime());


    }
}


if (!function_exists('public_path')) {
    function public_path($path)
    {

        return root_path('public/' . $path);
    }
}

if (!function_exists('send')) {
    function send()
    {
        $send = new \Application\system\Mail();

        return $send;
    }
}


if (!function_exists('errorLog')) {

    function errorLog()
    {
        ini_set('display_errors', 1);
        ini_set('log_errors', 1);
        ini_set('error_log', root_path('store/log/log.txt'));
        error_reporting(E_ALL);
        return true;
    }
}


if (!function_exists('Auth')) {
    function Auth()
    {
        $authResponse = \Application\system\Session::get('Auth');
        return $authResponse;
    }
}

if (!function_exists('str_limit')) {
    function str_limit($text, $limit)
    {
        return substr($text, 0, $limit);
    }
}