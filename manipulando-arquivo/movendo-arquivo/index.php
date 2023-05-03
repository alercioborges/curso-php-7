<?php

$dir1 = "folder_01";
$dir2 = "folder_02";

//Criando os dir. se não existir
if (!is_dir($dir1)) mkdir($dir1);
if (!is_dir($dir2)) mkdir($dir2);

$filename = "README.txt";

    //Se o arquivo "README.txt" ñ existir
    if (!file_exists($dir1 . DIRECTORY_SEPARATOR . $filename)) { //Se o arquivo 

       //Criando o arquivo "README.txt"
        $file = fopen($dir1 . DIRECTORY_SEPARATOR . $filename, "w+");

        //Inreindo dado no atquivo criado
        fwrite($file, date("Y-m-d H:i:s")); //Inserindo dado da data

        fclose($file); //Fechando o arquivo na memória

    }

    //Função p/ renomear e/ou mover o arquivo
    rename(
        $dir1 . DIRECTORY_SEPARATOR . $filename, //Origem
        $dir2 . DIRECTORY_SEPARATOR . $filename //Destino
    );

    echo "Arquivo movido com sucesso!";

?>