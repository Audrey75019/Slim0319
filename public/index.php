<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;

require_once dirname(__DIR__) . '/vendor/autoload.php';

//création de l'application

$app = new App();

$route = $app->get('/', function ( ServerRequestInterface $request, ResponseInterface $response, ?array $args
) {
    return $response->getBody()->write('<h1>Hello</h1>');
});
$route->setName('homepage');


$app->group('/projet', function () {
    $this->get("/{id:\d+}", function ( ServerRequestInterface $request, ResponseInterface $response, ?array $args
    ) {
        return $response->getBody()->write('<h1>Détail du projet</h1>');
    }) ->setName('app_project_show');

    $this->get("/creation", function ( ServerRequestInterface $request, ResponseInterface $response, ?array $args
    ) {
        return $response->getBody()->write('<h1>Création d\'un projet</h1>');
    }) ->setName('app_project_create');
});





//création et renvoi de la réponse au navigateur
$app->run();
