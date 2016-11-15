<?php

namespace Database\Repositories;

class UniversityRepository implements RepositoryInterface
{
    private $connector;

    public function __construct($connection)
    {
        $this->connector = $connection;
    }

    public function fetchUniversityData($statement)
    {
        while ($university = $statement->fetch()) {
            $universities[] = [
                'id' => $university['id'],
                'name' => $university['name'],
                'town' => $university['town'],
                'site' => $university['site'],
            ];
        }

        return $universities;
    }

    public function findAll()
    {
        $statement = $this->connector->query('SELECT * FROM university');

        return $this->fetchUniversityData($statement);
    }
    public function findBy($id)
    {
        $statement = $this->connector->prepare('SELECT * FROM university WHERE id = :id LIMIT 1');
        $statement->bindValue(':id', (int) $id);
        $statement->execute();
        $universityData = $this->fetchUniversityData($statement);

        return $universityData[0];
    }
    public function insert($universityData)
    {
        $statement = $this->connector->prepare('INSERT INTO university (name, town, site) VALUES (:name, :town, :site)');
        $statement->bindValue(':name', $universityData['name']);
        $statement->bindValue(':town', $universityData['town']);
        $statement->bindValue(':site', $universityData['site']);

        return $statement->execute();
    }
    public function update($universityData)
    {
        $statement = $this->connector->prepare('UPDATE university SET name = :name, town = :town, site = :site WHERE id = :id');
        $statement->bindValue(':name', $universityData['name']);
        $statement->bindValue(':town', $universityData['town']);
        $statement->bindValue(':site', $universityData['site']);
        $statement->bindValue(':id', $universityData['id']);

        return $statement->execute();
    }
    public function delete($universityData)
    {
        $statement = $this->connector->prepare('DELETE FROM university WHERE  id = :id');
        $statement->bindvalue(':id', $universityData['id'], \PDO::PARAM_INT);

        return $statement->execute();
    }
}
