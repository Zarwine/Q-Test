<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();
$routes->add('', new Route('/', [
    '_controller' => ["App\Controllers\HomeController" => "showHome"]
    ]));
$routes->add('home', new Route('/home', [
    '_controller' => ["App\Controllers\HomeController" => "showHome"]
    ]));
$routes->add('admin', new Route('/admin', [
    '_controller' => ["App\Controllers\HomeController" => 'showAdmin']
    ]));
$routes->add('new-message', new Route('/new', [
    '_controller' => ["App\Controllers\ContactsController" => 'createNewMessage']
    ]));
$routes->add('update-message', new Route('/update/{id}', [
    '_controller' => ["App\Controllers\ContactsController" => 'toggleViewedMessageStatut']
    ]));

return $routes;