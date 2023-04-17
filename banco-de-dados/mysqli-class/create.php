<?php

require_once("connection.php");


$sttmt = $con->prepare("INSERT INTO tb_user VALUES(?, ?, ?, ?, ?, ?, ?, ?)");

//'s' refere-se ao tipo string do dadp a ser inserido no DB
$sttmt->bind_param("ssssssss", $id, $username, $email, $firstname, $lastname, $pass, $tC, $te);

$id = 'NULL';
$username = 'marinaruy';
$email = 'marina@email.com';
$firstname = 'Marina';
$lastname = 'Ruy Barbosa';
$pass = 'gsdfghgdsfhh';
$tC = NULL;
 $te  = NULL;

$sttmt->execute();

?>