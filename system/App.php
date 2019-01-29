<?php

namespace Application\system;
/**
 * Class App
 * @package Application\system
 */
class App
{
    /**
     * start application
     */
    public function run()
    {
        errorLog();
        session_start();
        date_default_timezone_set('Asia/Kathmandu');
        $this->getEnv();
        $route = new Route();
        require_once root_path('route/web.php');
        $routeCheck = $route->RouteExists();
        if ($routeCheck != true) {
            echo "<h1 style='border: 1px solid gray;margin:100px auto;width: 30%;text-align: center;
            padding: 5px;text-transform:uppercase;font-family: sans-serif;font-size: 18px;'>Route not found " . Server::url() . " </h1>";
        }
        unset($route);

    }

    /**
     * check env
     */
    public function getEnv()
    {

        $env = Config::get('env.name');
        switch ($env) {
            case 'production':
                break;
            case "development":
            default:
                if (!ini_get('display_errors')) {
                    ini_set('display_errors', 0);
                }
                error_reporting(E_ALL);
                error_reporting('-1');

                break;
                break;

        }

    }

}