<?php

//Função que cria arquivo passando o caminho e nome do arquibo--
//--e o tipo de criação do arquivo 
$file = fopen("teste.txt", "w+");

fclose($file);

//Função que remove arquivo passando o caminho e nome do arquibo
unlink("teste.txt");

echo "Arquivo removido com sucesso!";

?>