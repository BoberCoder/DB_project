<?php

namespace Database\Controller;

use Database\Repositories\UniversityRepository;


class UniversityController
{
    private $repository;

    private $loader;

    private $twig;

    public function __construct($connection){
        $this->repository = new UniversityRepository($connection);
        $this->loader = new \Twig_Loader_Filesystem('src/Views');
        $this->twig = new \Twig_Environment($this->loader, array('cache'=>false));
    }

    public function actionList()
    {
       $universityData = $this->repository->findAll();

       return $this->twig->display('university.html.twig',['university'=>$universityData]);



    }

    public function actionNew()
    {
        if (isset($_POST['submit'])){
        $this->repository->insert(
            [
                'name' => $_POST['name'],
                'town' => $_POST['town'],
                'site' => $_POST['site']
            ]
        );
        return $this->actionList();
        }
        return $this->twig->display('university_new.html.twig');
    }

}
