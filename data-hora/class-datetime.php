<?php


$dt = new DateTime(); //Objeto nativo do PHP 'DateTime'

$periodo = new DateInterval("P15D"); //Objeto nativo do PHP 'DateInterval'

echo $dt->format("d/m/Y H:i:s");

echo "<br>";

$dt->add($periodo); //add mais 15 dias a data atual

echo $dt->format("d/m/Y H:i:s");


?>