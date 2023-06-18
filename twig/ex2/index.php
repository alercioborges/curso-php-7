<?php

require_once '../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('view');
$twig = new \Twig\Environment($loader, [
    'cache' => 'view/cache',
    'cache' => false
]);

$template = $twig->load("template.html");

$testeIf = ['nota' => 5];

$testeLista = ['lista' => [1, 2, 3, 4, 5]];

$data = [
    'nota' => 5,
    'lista' => [1, 2, 3, 4, 5]
];

//$template->display($testeIf);
//$template->display($testeLista);
$template->display($data);
?>