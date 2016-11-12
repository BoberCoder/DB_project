<?php

namespace Database\Components;

class ConnectionToBD
{
    private $connection;

    public function __construct($database,$username,$password)
    {
        $this->connection = new \PDO("mysql:host=localhost;charset=UTF8",$username,$password);
        $this->connection->query('CREATE DATABASE IF NOT EXISTS stud_homework');
        $this->connection = new \PDO("mysql:host=localhost;dbname=".$database.";charset=UTF8",$username,$password);

        if (!$this->connection) {
            echo "Connecting error";
        }

    }

    public function getConnection(){
        return $this->connection;
    }


}