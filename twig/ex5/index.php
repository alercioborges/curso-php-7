<?php

require_once '../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('view');
$twig = new \Twig\Environment($loader, [
    'cache' => 'view/cache',
    'cache' => false,
    'debug' => true
]);

$twig->addExtension(new \Twig\Extension\DebugExtension());

$template = $twig->load("template.html");

$template->display();

?>