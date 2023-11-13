<?php


function route(array $routes)
{
    if (isset($_GET['controller']) && isset($_GET['action'])) {
        $controller = $_GET['controller'];
        $action = $_GET['action'];
    } else {
        $uri = explode('?', $_SERVER['REQUEST_URI']);
        $uri = $uri[0];

        if (!isset($routes[$uri])) {
            render404();
        }

        if (empty($uri)) {
            $controller = $routes['/']['controller'];
            $action = $routes['/']['action'];
        } else {
            $controller = $routes[$uri]['controller'];
            $action = $routes[$uri]['action'];
        };
    }
    try{
       if (!class_exists($controller) || !method_exists($controller, $action)) {
           render404();
       }
        $controller = new $controller();
        $controller->$action();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function clean($userInput, $encoding = 'UTF-8')
{
    return htmlspecialchars($userInput, ENT_QUOTES | ENT_HTML5, $encoding);
}

function redirect($url)
{
    header('Location: ' . $url);
    exit;
}

function render404()
{
    header('HTTP/1.0 404 Not Found');
    die('Error 404');
}

function render500($message)
{
    header('HTTP/1.0 500 Not Found');
    die('Error 500 ' . $message);
}

