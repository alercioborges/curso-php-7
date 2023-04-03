<?php

$nome = "Alercio";

function teste() //escopo da função teste()
{
	global $nome; //usar 'global' para acessar variavel de escopo diferente
	echo $nome; 

}

teste();

function teste2()  //escopo da função teste2()
{
	global $nome; //usar 'global' para acessar variavel de escopo diferente
	echo "<br>" . $nome . "<br>";
}

teste2();





?>