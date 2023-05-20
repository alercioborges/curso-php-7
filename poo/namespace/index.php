<?php

require_once("config.php");

//Expecificando que a classe usada é a de namespace 'Cliente' usabso o comando 'use'
//A classe 'Cadastro' instanciada será a de namespace 'Cliente'
use Cliente\Cadastro;

$cad = new Cadastro();

$cad->setNome("Djalma Sindeaux");
$cad->setEmail("djalma@hcode.com.br");
$cad->setSenha("123456");

$cad->registrarVenda();

?>