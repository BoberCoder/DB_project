<?php

include "vendor/autoload.php";
include "src/config/ConnectionData.php";
include "src/config/routes.php";

$connection = new \Database\ConnectionToBD($database, $username, $password);
