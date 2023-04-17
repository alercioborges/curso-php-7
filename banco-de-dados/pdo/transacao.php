<?php

require_once 'connection.php';

//Métododa classe PDO 'begintransaction'
//Necessário para usar o método 'rollback' e 'commit'
$con->begintransaction(); //Inicia a transição 

$stmt = $con->prepare("DELETE FROM tb_user WHERE id = ?"); //Usando '?' ao inves de ':ID'

$id = 40;

$stmt->execute(array($id)); //'$id' refere-se a '?' do método 'prepare'

//$con->rollback(); //Nétodo p/ cancelar a transação

$con->commit(); //Nétodo p/ confirmar a transação

if($stmt) {
	echo "Cadastro excluido com sucesso!";
}

?>