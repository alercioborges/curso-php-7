<?php

require_once("Veiculo.php");
require_once("Carro.php");

$veiculo1 = new Veiculo();
$carro1 = new Carro();

$veiculo1->setTipo("Carro");
$veiculo1->setTipoDeIdentificacao("Placa");

$carro1->setPlaca("qwer-1234");
$carro1->setModelo("Porche");
$carro1->setAno("2023");
$carro1->setA($veiculo1);

echo "<pre>"; var_dump($carro1); echo "</pre>";

?>