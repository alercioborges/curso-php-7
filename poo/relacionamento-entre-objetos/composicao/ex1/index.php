<?php

//https://www.youtube.com/watch?v=yIHX-I11BPM

require_once 'client.php';
require_once 'address.php';

echo "POO Composição Exemplo 01" . "<br /><br />";

$cliente = new Client();
$cliente->setName("Alercio Silva");
$cliente->setEmail("alercio@email.com");
$cliente->setAddresses("São Paulo", "SP");
$cliente->setAddresses("Belo Horizonte", "MG");
$cliente->setAddresses("Porto Alegre", "RS");

$endereco = new Address("São Paulo", "SP");


echo "CLIENTE";
echo "<pre>"; var_export($cliente); echo "</pre>";

echo "ENDEREÇOS";
echo "<pre>"; var_export($endereco); echo "</pre>";

$cliente->getAddresses();

?>