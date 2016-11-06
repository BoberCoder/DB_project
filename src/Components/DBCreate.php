<?php

namespace Database\Components;


class DBCreate
{
    private $connector;

    private $database;

    private $username;

    private $password;

    public function __construct($connection,$database,$username,$password)
    {
        $this->database = $database;
        $this->username = $username;
        $this->password = $password;
        $this->connector = $connection->connectToServer($this->username,$this->password);
        $this->createDB();
        $this->connector = $connection->connectToBase($this->database,$this->username,$this->password);
        $this->universityTable();
        $this->departmentsTable();
        $this->studentsTable();
        $this->homeworksTable();

    }

    public function createDB(){
        $this->connector->query('CREATE DATABASE stud_homework');
    }

    private function universityTable(){
        $this->connector->query('CREATE TABLE university(id INT ,name VARCHAR(50))');
    }

    private function departmentsTable(){

    }

    private function studentsTable(){

    }

    private function homeworksTable(){

    }



}