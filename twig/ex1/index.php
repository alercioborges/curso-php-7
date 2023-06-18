<?php

require_once '../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('view');
$twig = new \Twig\Environment($loader, [
    'cache' => 'view/cache',
    'cache' => false
]);

$template = $twig->load("template.html");


$valores = array(   'TITULO' => "Twing",
                    'NOME'   => "Alercio",
                    'EMAIL'  => "alercio@email.com"
);

$template->display($valores);

?>