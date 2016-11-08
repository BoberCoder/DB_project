<?php

namespace Database\Components;

class ConnectionToBD
{
    private $connection;

    public function connectToServer($username,$password)
    {
            $this->connection = new \PDO("mysql:host=localhost;charset=UTF8",$username,$password);

        if (!$this->connection) {
            echo "Connecting error";
        }

        return $this->connection;

    }

    public function connectToBase($database,$username,$password)
    {
        $this->connection = new \PDO("mysql:host=localhost;dbname=".$database.";charset=UTF8",$username,$password);

        if (!$this->connection) {
            echo "Connecting error";
        }

        return $this->connection;

    }


}