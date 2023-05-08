<?php


//http://localhost/curso-php-7/seguranca/sql-injection.php?id=51 OR 1 = 1 -- 
//'?id=4 OR 1 = 1 -- ' comando sql-injection (cancela a clausula WHERE)
$id = (isset($_GET["id"]))?$_GET["id"]:4;


///*
//Tratando a entrada para evitar o ataque
//Verif. se a entrada é um dado numerico--
//--e verif. o tamnho da string passada (numeros de algarismos do id)
if (!is_numeric($id) || strlen($id) > 5) {

    exit("Pegamos você!"); //Saindo da aplicação

}
//*/

$host = '127.0.0.1';
$dbuser = 'curso-php-7';
$dbpass = 'passcursophp7';
$dbname = 'curso-php-7';

$conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);

$sql = "SELECT * FROM tb_user WHERE id = $id";

$exec = mysqli_query($conn, $sql);

while ($resultado = mysqli_fetch_object($exec)) {

    echo $resultado->firstname . "<br>";

}

?>