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

$userdata = array(
    array(
        'id' => 1,
        'username' => "alercio",
        'firstname' => "Alercio",
        'lastname' => "Silva",
        'deleted' => 0

    ),
    array(
        'id' => 2,
        'username' => "marina",
        'firstname' => "Marina",
        'lastname' => "Ruy Barbosa",
        'deleted' => 0

    ),
    array(
        'id' => 3,
        'username' => "paola",
        'firstname' => "Paola",
        'lastname' => "Oliveira",
        'deleted' => 0

    ),
    array(
        'id' => 4,
        'username' => "maria",
        'firstname' => "Maria",
        'lastname' => "do Carmo",
        'deleted' => 1
    )
);

$users = ['userlist' => $userdata];

$template->display($users);

?>