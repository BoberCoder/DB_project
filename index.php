<?php

include "vendor/autoload.php";
include "src/config/ConnectionData.php";

use Database\Components\Router;

$connection = new \Database\Components\ConnectionToBD($database,$username,$password);
$dbcreator = new \Database\Components\DBCreate($connection);



$router = new Router($connection->getConnection());
$router->run();




