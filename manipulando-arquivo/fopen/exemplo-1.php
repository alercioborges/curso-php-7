<?php


//Passando o caminho do arquivo e como usar o arquivo "a+"
$file = fopen("log.txt", "a+");

//Funão para inserir dado no arquivo
fwrite($file, date("Y-m-d H:i:s") . "\r\n"); //ir p/ linha abaixo

//Função para liberar da memório (fechar o processo)
fclose($file);

echo "Arquivo criado com sucesso!<br><br>";

?>