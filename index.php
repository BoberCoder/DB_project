<?php

include "vendor/autoload.php";
include "src/config/ConnectionData.php";

use Database\Components\Router;

/*
 * create a connection object, then create database creator object(which permanent construct a DB)
 */
$connection = new \Database\Components\ConnectionToBD();
$dbcreator = new \Database\Components\DBCreate($connection,$database,$username,$password);

/*
 * write PDO object in $connection from getConnection method
 */
$connection = $dbcreator->getConnection();

$router = new Router($connection);
$router->run();




