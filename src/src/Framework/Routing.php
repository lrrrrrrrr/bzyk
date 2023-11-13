<?php


namespace Application\Framework;
class Routing
{
    private $routes;

    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    public function route()
    {
        if (isset($_GET['controller']) && isset($_GET['action'])) {
            $controller = $_GET['controller'];
            $action = $_GET['action'];
        } else {
            $uri = explode('?', $_SERVER['REQUEST_URI']);
            $uri = $uri[0];

            if (!isset($this->routes[$uri])) {
                render404();
            }

            if (empty($uri)) {
                $controller = $this->routes['/']['controller'];
                $action = $this->routes['/']['action'];
            } else {
                $controller = $this->routes[$uri]['controller'];
                $action = $this->routes[$uri]['action'];
            };
        }
        try{
            if (!class_exists($controller) || !method_exists($controller, $action)) {
                render404();
            }
            $controller = new $controller();
            $controller->$action();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}