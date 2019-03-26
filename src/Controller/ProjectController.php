<?php

namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

class ProjectController
{   //quand on fait de l'injonction de dépendance il faut toujours mettre un argument dans le constructeur et mettre me chemin
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

    public function create( ServerRequestInterface $request, ResponseInterface $response, ?array $args
    )
    {
        return $response->getBody()->write('<h1>Création d\'un projet</h1>');
    }
}