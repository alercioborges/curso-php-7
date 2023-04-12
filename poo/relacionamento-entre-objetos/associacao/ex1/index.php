<?php

//https://www.youtube.com/watch?v=_K9aBkMr3zE

Include_once 'escritor.php';
Include_once 'caneta.php';

echo "POO Associação exemplo 01" . "<br /><br />";

$writer = new Escritor();
$pencil = new Caneta();

$writer->setName("Alercio Silva");
$writer->setPencil($pencil);

$pencil->setName("BIC");

echo "<pre>"; var_dump($writer); echo "</pre>" . "<br />";	
echo "<pre>"; var_dump($pencil); echo "</pre>" . "<br />";

$writer->getPencil()->write();
//tem q especificar o metodo ou atributo do objeto


?>