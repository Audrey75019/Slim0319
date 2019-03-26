<?php
use Generic\Database\Connection;

return [
    "root-dir" => dirname(__DIR__),
    "database_name" => 'bdd_mysql_command',
    "database_user" => 'php_user_bdd',
    "database_pass" => 'rjqwhMYlhNXmVOPc',

    Connection::class => function(\DI\Container $container) {
        return new Connection(
            $container->get('database_name'),
            $container->get('database_user'),
            $container->get('database_pass')
        );
    }
];