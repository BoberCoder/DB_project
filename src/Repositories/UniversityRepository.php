<?php

namespace Database\Repositories;


class UniversityRepository implements RepositoryInterface
{
    private $connector;

    public function __construct($connection)
    {
        $this->connector = $connection;
    }

    public function fetchUniversityData($statement){
        $university = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $university;
    }

    public function findAll()
    {
        $statement = $this->connector->query('SELECT * FROM university');
        return $this->fetchUniversityData($statement);

    }
    public function findBy()
    {
        // TODO: Implement findBy() method.
    }
    public function insert($universityData)
    {
        $statement = $this->connector->prepare('INSERT INTO university (name, town, site) VALUES (:name, :town, :site)');
        $statement->bindValue(':name',$universityData['name']);
        $statement->bindValue(':town',$universityData['town']);
        $statement->bindValue(':site',$universityData['site']);
        return $statement->execute();
    }
    public function update()
    {
        // TODO: Implement update() method.
    }
    public function delete()
    {
        // TODO: Implement delete() method.
    }
}