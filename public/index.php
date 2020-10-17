<?php

use App\Controllers\HomeController;
use Symfony\Component\Routing\Route;
use App\Controllers\ContactsController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

require dirname(__DIR__).'/vendor/autoload.php';

$route = new Route('/home', ['_controller' => HomeController::class]);
$routes = new RouteCollection();
$routes->add('home', $route);

$route = new Route('/admin', ['_controller' => HomeController::class]);
$routes->add('admin', $route);

$route = new Route('/new', ['_controller' => ContactsController::class]);
$routes->add('new-message', $route);


$request = Request::createFromGlobals();

$context = new RequestContext();
$context->fromRequest($request);
$matcher = new UrlMatcher($routes, $context);

try {
    extract($matcher->match($request->getPathInfo()), EXTR_SKIP);
    ob_start();

    include $_SERVER['DOCUMENT_ROOT'].'/views/header.php';
    include sprintf($_SERVER['DOCUMENT_ROOT'].'/views/%s.php', $_route);
    include $_SERVER['DOCUMENT_ROOT'].'/views/footer.php';

    $response = new Response(ob_get_clean());
} catch (ResourceNotFoundException $exception) {
    $response = new Response('Not Found', 404);
} catch (Exception $exception) {
    $response = new Response('An error occurred', 500);
}

$response->send();

//declaration of routes (read the README.md of https://github.com/symfony/routing)

//execution of request (read the README.md of https://github.com/symfony/routing)


//...
//if ($parameters) {
//    $response = null;//execute of request from controller 
//}
//else {
//    $response = new Response('Content not found', Response::HTTP_NOT_FOUND, ['content-type' => 'text/html']);
//}
//
//$response->send();
