<?php

include "vendor/autoload.php";
include "src/config/ConnectionData.php";

use Database\Components\Router;

$connection = new \Database\Components\ConnectionToBD();
$dbcreator = new \Database\Components\DBCreate($connection,$database,$username,$password);

$router = new Router();
$router->run();




