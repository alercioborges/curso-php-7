<?php

//usando a classe nativa do PHP 'mysqli'

$host = '127.0.0.1';
$dbuser = 'curso-php-7';
$dbpass = 'passcursophp7';
$dbname = 'curso-php-7';

$con = new mysqli($host, $dbuser, $dbpass, $dbname); //classe nativa que começa com letra minuscula

if ($con->connect_error) { //método da classe mysqli que retorna erro de conexão
	echo "Erro: " . $con->connect_error;
} else {
	echo "Conexão realizada com sucesso! <br><br>";
}

?>