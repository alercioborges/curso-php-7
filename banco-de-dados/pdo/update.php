<?php

require_once 'connection.php';

$stmt = $con->prepare("UPDATE tb_user SET
						username = :USERNAME,
						email = :EMAIL,
						firstname = :FIRSTNAME,
						lastname = :LASTNAME,
						pass = :PASS,
						created = :TC,
						edited = :TE
						WHERE id = :ID");

$id = 48;
$username = 'marinaruy';
$email = 'marina@email.com.br';
$firstname = 'Marina';
$lastname = 'Ruy Barbosa';
$pass = 'gsdfghgdsfhh';
$tc = NULL;
$te  = date("Y-m-d h:i:s");

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
	echo "Cadastro editado com sucesso!";
} else {
	echo "Erro ao tentar editar cadastro";
}

?>