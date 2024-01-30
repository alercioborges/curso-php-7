<?php

$dsn = 'mysql';
$host = '127.0.0.1';
$dbuser = 'curso-php-7';
$dbpass = 'passcursophp7';
$dbname = 'curso-php-7';


Try{
	$con = new PDO("{$dsn}:dbname={$dbname};host={$host}", $dbuser, $dbpass);
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "Conexão com o banco de dados realizada com sucesso! <br><br>";
}
catch(\PDOException $e)
{
	echo "Erro de conexão com o banco de dados: ".$e->getMessage();
}


?>