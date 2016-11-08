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
        $this->teacherTable();
        //$this->disciplineTable();
        //$this->homeworksTable();
    }

    public function createDB(){
        $this->connector->query('CREATE DATABASE stud_homework');
    }

    private function universityTable(){
        $this->connector->query('CREATE TABLE university(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50),town VARCHAR(30),site VARCHAR(40) )');
    }

    private function departmentsTable(){
        $this->connector->query('CREATE TABLE department(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50),university_id INT ,FOREIGN KEY (university_id) REFERENCES university(id) ON DELETE CASCADE)');
    }

    private function studentsTable(){
        $this->connector->query('CREATE TABLE students(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30),surname VARCHAR(30),email VARCHAR(30) ,phone INT ,university_id INT,FOREIGN KEY (university_id) REFERENCES university(id) ON DELETE CASCADE )');
    }

    private function teacherTable(){
        $this->connector->query('CREATE TABLE teacher(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30),surname VARCHAR(30),department_id INT ,
        FOREIGN KEY (department_id) REFERENCES department(id) ON DELETE CASCADE )');
    }

    private function disciplineTable(){
        $this->connector->query('CREATE TABLE discipline(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30),department VARCHAR(30),FOREIGN KEY (department) REFERENCES department(name) ON DELETE CASCADE )');
    }

    private function homeworksTable(){
        $this->connector->query('CREATE TABLE homework(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        discipline VARCHAR(30),description MESSAGE_TEXT ,FOREIGN KEY (discipline) REFERENCES discipline(name) ON DELETE CASCADE )');
    }

    public function getConnection(){
        return $this->connector;
    }


}