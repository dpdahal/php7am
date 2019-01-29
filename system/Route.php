<?php

namespace Application\system;
/**
 * Class Route
 * @package Application\system
 */
class Route
{


    /**
     * @var string
     */
    protected $controllerNameSpace = "Application\App\Controllers\\";
    protected $_route_exists = false;

    /**
     * @param $requestMethod
     * @return bool
     */
    protected function callController($requestMethod)
    {
        $method = explode('@', $requestMethod);
        if (count($method) > 2) throw new \PDOException('ControllerName and method is required');
        $controllerName = $method[0];
        $methodName = $method[1];
        $controller = $this->controllerNameSpace . $controllerName;
        if (!class_exists($controller)) throw new \PDOException('Controller not exists' . $controller);
        $controllerObject = new $controller;
        if (!method_exists($controllerObject, $methodName)) throw new \PDOException('Method not exists ' . "" . $methodName);
        $controllerObject->$methodName();
        return true;

    }

    /**
     * @param $requestRui
     * @param $requestMethod
     * @return bool
     */
    public function parseMiddleware($middlewares)
    {
        $middlewarePath = "Application\App\Middleware\\";
        foreach ($middlewares as $middleware) {
            $middlewareClass = $middlewarePath . $middleware;
            if (!class_exists($middlewareClass)) throw new \PDOException("Middleware not found " . $middleware);
            $middlewareObject = new $middlewareClass();
            $middlewareObject->run();
        }

    }

    public function get($requestRui, $requestMethod, $middleware = array())
    {

        if (!Request::method('get')) return false;
        if (empty($requestRui)) throw new \PDOException("Request uri is required");
        $url = Server::url();
        if ($url == $requestRui) {
            if (!empty($middleware) && is_array($middleware)) $this->parseMiddleware($middleware);
            $this->_route_exists = true;
            $this->callController($requestMethod);

        }

        return false;
    }

    /**
     * @param $requestRui
     * @param $requestMethod
     * @return bool
     *  post route
     */
    public function post($requestRui, $requestMethod)
    {
        if (!Request::method('post')) return false;
        if (empty($requestRui)) throw new \PDOException("Request uri is required");
        $url = Server::url();
        if ($url == $requestRui) {
            $this->_route_exists = true;
            $this->callController($requestMethod);

        }

        return false;
    }

    /**
     * @return bool
     */

    public function RouteExists()
    {

        return $this->_route_exists;
    }

}