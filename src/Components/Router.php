<?php

namespace Database\Components;


class Router
{
    private $routes;

    private $connection;

    public function __construct($connection)
    {
        $this->routes = include($_SERVER['DOCUMENT_ROOT'].'/src/config/routes.php');

        $this->connection = $connection;
    }

    private function getURI() {
        if (isset($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'],'/');
        }
    }

    public function run()
    {
        $uri = $this->getURI();

        foreach ($this->routes as $uriPattern =>$path)
        {

            if ("$uriPattern" == $uri){

                $segments = explode('/',$path);
                $controllerName = "\\Database\\Controller\\".ucfirst(array_shift($segments).'Controller');

                $actionName = 'action'.ucfirst(array_shift($segments));

                $controller = new $controllerName($this->connection);
                $controller->$actionName();
            }
        }

    }

}