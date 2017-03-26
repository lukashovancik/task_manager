<?php


class Router
{
    protected $routes = [
        'GET' => [],
        'POST' => []
    ];

    public static function load($file)
    {
        $router = new self();

        require '../'.$file;

        return $router;
    }

    public function define($router)
    {
        $this->routes = $router;
    }

    public function get($uri,$controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri,$controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function direct($uri,$method)
    {
        if (array_key_exists($uri, $this->routes[$method])) {

            return $this->callAction(
                ...explode('@',$this->routes[$method][$uri])
            );
        }

        throw new Exception('Not route defined for this uri ');
    }

    protected function callAction($controller,$action)
    {
        $controller = new $controller();

        if(! method_exists($controller,$action)){
            throw new Exception(
                "{$controller} with {$action} not found"
            );
        }

         return $controller->$action();
    }
}