<?php

namespace Database\Repositories;


interface RepositoryInterface
{
    public function findAll();


    public function insert($universityData);


    public function update();


    public function delete();


    public function findBy();
}