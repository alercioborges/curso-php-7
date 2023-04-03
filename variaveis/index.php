<?php

echo "Variavel _GET[]<br /><br />";	
//$_GET - array super global
//recebe variaveis/valor por URL

echo "Exemplo _GET[] padrão<br />";
//passando valor a variavel por url (exemplo): 
//http://localhost/php/variaveis/index.php?nome=2
//O caractere '?' separa url do que é variavel
//padrão é o tipo String
$nome = $_GET["nome"];
var_dump($nome);
echo "<br /><br />";

//Usa '&' p/ separar o receber das variaveis

echo "Exemplo _GET[] forçando tipo 'int'<br />";
//adicionar (int) antes da variavel
//localhost/php/variaveis/index.php?nome=Alercio&idade=32
$idade = (int)$_GET["idade"];
var_dump($idade);
echo "<br /><br />";

echo "Variavel _SERVER[]<br /><br />";

echo "Pegendo o IP do usuário<br />";
//pegando o IP do usuário
//localhost é ::1
$ip = $_SERVER["REMOTE_ADDR"];
echo $ip;
echo "<br /><br />";

echo "Pegendo o arquivo acesado<br />";
//Peg o caminha após o domimio
$arquivo = $_SERVER["SCRIPT_NAME"];
echo $arquivo;
echo "<br /><br />";

//operador 'E' = &&
//operador 'OU' = ||


?>