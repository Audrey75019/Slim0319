<?php

namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

class ProjectController
{   //quand on fait de l'injection de dépendance il faut toujours mettre un argument dans le constructeur et mettre le chemin
    public function __construct(Twig $twig)
    {
        $this->twig = $twig;
    }

    public function show(ServerRequestInterface $request, ResponseInterface $response, ?array $args
    )
    {
        //return $response->getBody()->write('<h1>Détail du projet</h1>');
        return $this->twig->render($response, 'project/show.twig');
    }
    public function home(ServerRequestInterface $request, ResponseInterface $response, ?array $args
    )
    {
        return $this->twig->render($response, 'project/home.twig');
    }
    public function create( ServerRequestInterface $request, ResponseInterface $response, ?array $args
    )
    {
        return $this->twig->render($response, 'project/create.twig');
    }
}