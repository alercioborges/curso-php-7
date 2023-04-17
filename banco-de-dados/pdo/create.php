<?php

require_once 'connection.php';

//Primeira Forma
/*
$id = 'NULL';
$username = 'marinaruy';
$email = 'marina@email.com.br';
$firstname = 'Marina';
$lastname = 'Ruy Barbosa';
$pass = 'gsdfghgdsfhh';
$tc = 'NULL';
$te  = 'NULL';


$query = "INSERT INTO tb_user VALUES($id, '$username', '$email', '$firstname', '$lastname', '$pass', $tc, $te)";

echo $query . "<br><br>";

$statement = $con->prepare($query);

$statement->execute();

if($statement) {
	echo "Cadastrado com sucesso!";
} else {
	echo "Erro ao tentar cadastrar	";
}
*/

//Segunda Forma
$stmt = $con->prepare("INSERT INTO tb_user VALUES(:ID, :USERNAME, :EMAIL, :FIRSTNAME, :LASTNAME, :PASS, :TC, :TE)");

$id = NULL;
$username = 'marinaruy';
$email = 'marina@email.com.br';
$firstname = 'Marina';
$lastname = 'Ruy Barbosa';
$pass = 'gsdfghgdsfhh';
$tc = NULL;
$te  = NULL;

$stmt->bindParam(":ID", $id);
$stmt->bindParam(":USERNAME", $username);
$stmt->bindParam(":EMAIL", $email);
$stmt->bindParam(":FIRSTNAME", $firstname);
$stmt->bindParam(":LASTNAME", $lastname);
$stmt->bindParam(":PASS", $pass);
$stmt->bindParam(":TC", $tc);
$stmt->bindParam(":TE", $te);

$stmt->execute();

if($stmt) {
	echo "Cadastrado com sucesso!";
} else {
	echo "Erro ao tentar cadastrar	";
}

?>