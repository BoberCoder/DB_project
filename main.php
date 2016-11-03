<?php

include "vendor/autoload.php";
include "ConnectionData.php";

$connection = new \Database\ConnectionToBD($database, $username, $password);
