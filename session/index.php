<?php

//São enxergadas em todas as páginas enquanto o usuário está conectado
//Servem para compartilhar informações entre as páginas navegadas
echo "Variavel de sessão <br /><br />";

//Para usar sessão, informar usando a função 'session_start'
session_start();

$_SESSION['nome'] = "Alercio";
$_SESSION['email'] = "alercio#email.com";
$_SESSION['data_nascimento'] = "21-04-1989";


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sessão inicial</title>
</head>
<body>
	<div>
		<a href="session.php">Ir para a página de sessão</a>
	</div>
	<br><br>
</body>
</html>