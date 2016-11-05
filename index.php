<?php

include "vendor/autoload.php";
include "src/config/ConnectionData.php";

use Database\Components\ConnectionToBD;
use Database\Components\Router;

$connection = new ConnectionToBD($database, $username, $password);

$router = new Router();
$router->run();




