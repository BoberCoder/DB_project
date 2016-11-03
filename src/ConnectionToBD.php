<?php

namespace Database;

class ConnectionToBD
{
    private $connection;

    public function __construct($database,$username,$password)
    {
        $this->connection = new \PDO("mysql:host=localhost;dbname=". $database. ";charset=UTF8",$username,$password);

        if (!$this->connection) {
            echo "Connecting error";
        }
        else {
            echo "Connecting successfully\n";
        }
    }

    public function getConection(){
        return $this->connection;
    }

}