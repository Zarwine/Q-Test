<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

require dirname(__DIR__).'/vendor/autoload.php';

$routes = require __DIR__.'/../src/routes.php';

$request = Request::createFromGlobals();

$context = new RequestContext();
$context->fromRequest($request);

$matcher = new UrlMatcher($routes, $context);

try {
    $resultat = ($matcher->match($request->getPathInfo()));
    $request->attributes->add($resultat);
    $response = call_user_func($resultat['_controller'], $request);
} catch (ResourceNotFoundException $exception) {
    $response = new Response('La page demandée n\'existe pas', 404);
} catch (Exception $exception) {
    $response = new Response('Une erreur est survenue', 500);
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
