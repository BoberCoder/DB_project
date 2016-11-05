<?php

namespace Database\Components;

class Router
{
    private $routes;

    public function __construct()
    {
        $this->routes = include($_SERVER['DOCUMENT_ROOT'].'/src/config/routes.php');
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

            if (preg_match("~$uriPattern~",$uri)){

                $segments = explode('/',$path);
                $controllerName = "\\Database\\Controller\\".ucfirst(array_shift($segments).'Controller');

                $actionName = 'action'.ucfirst(array_shift($segments));

                $controller = new $controllerName;
                $controller->$actionName();


            }
        }

    }

}