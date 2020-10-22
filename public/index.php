<?php

use App\Repository\DatabaseSQLite;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

require dirname(__DIR__).'/vendor/autoload.php';
require_once dirname(__DIR__).'/config/database.php';
require_once dirname(__DIR__).'/migrations/create_contact_table.php';
$routes = require __DIR__.'/../src/routes.php';

$migration = new CreateContactTable(DEVDB);
$migration->createTable();

$request = Request::createFromGlobals();

$context = new RequestContext();
$context->fromRequest($request);

$matcher = new UrlMatcher($routes, $context);

include dirname(__DIR__) . '../views/header.php';

try {
    $resultat = ($matcher->match($request->getPathInfo()));
    $request->attributes->add($resultat);

    $className = array_key_first($resultat["_controller"]);
    $methodName = $resultat["_controller"][$className];

    $controller = [new $className, $methodName];

    $response = call_user_func($controller, $request);
} catch (ResourceNotFoundException $exception) {
    $response = new Response('La page demandée n\'existe pas', 404);
} catch (Exception $exception) {
    $response = new Response('Une erreur est survenue', 500);
}
$response->send();

include dirname(__DIR__) . '../views/footer.php';
