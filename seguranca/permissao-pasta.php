<?php

$pasta = "arquivos";
$permissao = "0775";

									//Segundo parametro opcional
									//Código da permissão
if (!is_dir($pasta)) mkdir($pasta, $permissao);

echo "Diretório criado com sucesso!";

?>