<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;

//Autoload
require_once dirname(__DIR__) . "/vendor/autoload.php";

//création de l'application
$app = new App();
//alt enter pour rajouter automatiquement les classes

$app->get('/hello', function (ServerRequestInterface $request, ResponseInterface $response, ?array $args) {
    return $response->getBody()->write('<h1>Bonjour</h1>');
});
// lancement de l'application. Création et renvoie de la réponse au navigateur
$app->run();
