<?php

use Slim\App;

require_once  dirname(__DIR__) . '/vendor/autoload.php';



//création de l'application
//debug des erreurs (a configurer manuellement depuis l'exemple de la doc application/configuration
$config = require dirname(__DIR__) . '/config/config.php';

$app = new App($config);

//configuration de Twig
// Get container

// Register component on container

//configuratuion du container d'injection de dépendance
require_once dirname(__DIR__) . '/config/container.php';
require_once dirname(__DIR__) . '/config/routes.php';



$app->run();
