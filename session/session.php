<?php

//Acesamdo esta página diretamente sem carregar os dados da sessão da página anteriro,
//--apresentará um erro
echo "Exibindo os dados da sessão de sessão <br /><br />";

//Para usar sessão, informar usando a função 'session_start'
session_start();
//session_unset(); //limpa a sessão
//session_destroy(); //Excluí totalmente  a sessão

echo $_SESSION['nome'];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Página de sessão</title>
</head>
<body>
	<div>
		<a href="index.php">Ir para a página inicial</a>
	</div>
</body>
</html>