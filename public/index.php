<?php

use App\Controller\ProjectController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;

require_once dirname(__DIR__) . '/vendor/autoload.php';

//création de l'application
$config = [
    'setting' => [
        'displayErrorDetails' => true
    ]//ca ca debug les erreurs et c'est a aller chercher sur le site de slim dans "application configuration"
];

$app = new App();

$container = $app->getContainer();

// Register component on container
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(dirname(__DIR__) . '/templates', [
        'cache' => false
    ]);

    // Instantiate and add Slim specific extension
    $router = $container->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $view->addExtension(new Slim\Views\TwigExtension($router, $uri));

    return $view;
};

$container[ProjectController::class] = function($container){
    return new ProjectController($container->get('view'));
};

$route = $app->get('/', function ( ServerRequestInterface $request, ResponseInterface $response, ?array $args
) {
    //return $response->getBody()->write('<h1>Hello</h1>');
    return $this->view->render($response, 'home.twig');

});
$route->setName('homepage');

$route = $app->get('/contact', function ( ServerRequestInterface $request, ResponseInterface $response, ?array $args
) {
    //return $response->getBody()->write('<h1>Hello</h1>');
    return $this->view->render($response, 'contact.twig');

});
$route->setName('contactpage');


$app->group('/projet', function () {
    // creation d'une page de détail de projets
    //nouveauté : on ajoute une variable dans l'url avec les accolades
    $this->get("/{id:\d+}", ProjectController::class . ':show')->setName('app_project_create');
    // on retourne la réponse

    $this->get("/creation", ProjectController::class . ':create')->setName('app_project_create');

    //page de création
});





//création et renvoi de la réponse au navigateur
$app->run();
