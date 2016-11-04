<?php

use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$university = new Route('/university', array('controller'=>'UniversityController'));
$departments = new Route('/departments', array('controller=>DepartmentController'));
$students = new Route('/students', array('controller'=>'StudentsController'));
$homeworks = new Route('/homeworks', array('controller'=>'HomeworkController'));

$routes = new RouteCollection();

$routes->add('university',$university);
$routes->add('departments',$departments);
$routes->add('students',$students);
$routes->add('homeworks',$homeworks);

$context = new RequestContext('/');

$matcher = new UrlMatcher($routes,$context);

$parameters = $matcher->match($_SERVER['REQUEST_URI']);

