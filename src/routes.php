<?php

use App\Controllers\HomeController;
use App\Controllers\ContactsController;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();
$routes->add('home', new Route('/home', [
    '_controller' => [new HomeController, 'showHome']
    ]));
$routes->add('admin', new Route('/admin', [
    '_controller' => [new HomeController, 'showAdmin']
    ]));
$routes->add('new-message', new Route('/new', [
    '_controller' => [new ContactsController, 'createNewMessage']
    ]));

return $routes;