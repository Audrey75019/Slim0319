<?php

namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

class ProjectController
{

    /**
     * @var Twig
     */
    private $twig;

    public function __construct(Twig $twig)
    {
        $this->twig = $twig;
    }

    public function show(ServerRequestInterface $request, ResponseInterface $response, ?array $args)
    {
        $project = [
            "id" => 100,
            "name" => "My wonderful site",
            "startedAt" => '2019-03-27',
            "finishedAt" => '2019-03-27',
            "description" => '<h2>Site avec Slim Framework</h2><p>Lorem ipsum et autre BLA BLA BLA</p>',
            "image" => "site.png",
            "languages" => ["html5","css3", "php7.1", "sql"]
        ];

        //return $response->getBody()->write('<h1>Projet</h1>');
        return $this->twig->render($response, 'project/show.twig', [
            'project' => $project
        ]);
    }


    public function create( ServerRequestInterface $request, ResponseInterface $response, ?array $args
    )
    {
        return $this->twig->render($response, 'project/create.twig');
    }
}