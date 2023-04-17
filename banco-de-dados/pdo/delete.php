<?php

require_once 'connection.php';

$stmt = $con->prepare("DELETE FROM tb_user WHERE id = :ID");

$id = 46;

$stmt->bindParam(":ID", $id);

$stmt->execute();

if($stmt) {
	echo "Cadastro excluido com sucesso!";
}

?>