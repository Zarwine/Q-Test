<?php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;




//require autoload

//declaration of routes (read the README.md of https://github.com/symfony/routing)

//execution of request (read the README.md of https://github.com/symfony/routing)
//...
if ($parameters) {
    $response = null;//execute of request from controller 
}
else {
    $response = new Response('Content not found', Response::HTTP_NOT_FOUND, ['content-type' => 'text/html']);
}

$response->send();