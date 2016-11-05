<?php

namespace Database\Components;

class ConnectionToBD
{
    private $connection;

    public function __construct($database,$username,$password)
    {
        $this->connection = new \PDO("mysql:host=localhost;dbname=". $database. ";charset=UTF8",$username,$password);

        if (!$this->connection) {
            echo "Connecting error";
        }

    }

    public function getConection(){
        return $this->connection;
    }

}