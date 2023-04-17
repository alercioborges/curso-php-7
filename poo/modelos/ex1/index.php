<?php

//O arquivo deve ter o memsmo nome da classe

function spl_autoload_register($nomeClasse){
	require_once("$nomeClasse.php");
}



$carro1 = new Carro();


$carro1->setPlaca("qwer-1234");
$carro1->setModelo("Porche");
$carro1->setAno("2023");
$carro1->setTipo("Carro"); //Atributo e método da classe Veiculo (herança)
$carro1->setTipoDeIdentificacao("Placa"); //Atributo e método da classe Veiculo (herança)

echo "<pre>"; var_dump($carro1); echo "</pre>";

?>