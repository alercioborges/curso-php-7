<?php

include_once 'class_celular.php';


$celuular = new Celular();

$celuular->setModelo('POCO X3 Pro');
$celuular->setFabricante('XIAOMI');
$celuular->setAno('2021');
$celuular->setTipoProduto('CELULAR');
$celuular->setItemDeIdentificacao('EMEI');

echo '<br /><br />';


echo $celuular->getModelo() . '<br>';
echo $celuular->getFabricante() . '<br>';



echo '<pre>';
var_dump($celuular);
echo '</pre>';


?>