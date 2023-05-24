<?php

use Slim\Factory\AppFactory;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();
$app->setBasePath("/curso-php-7/slim/ex01/public");


$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write('<br><br>Hello world!<br><br>');   
    return $response;
});

$app->get('/ola/', function (Request $request, Response $response, $args) {
    $response->getBody()->write('<br><br>Hello world!<br><br>');   
    return $response;
});

$app->get('/hello/{name}', function (Request $request, Response $response, $args) {
    $name=$args['name'];
    $response->getBody()->write("Hello $name!");
    return $response;
});

echo "<pre>"; var_dump($app); echo "<pre>";
$app->run();     
