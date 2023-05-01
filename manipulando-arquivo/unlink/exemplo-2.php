<?php

//Criar o dir. "images" só se já não existir
if (!is_dir("images")) mkdir("images");

//Apagando os arquivos do dir.
foreach (scandir("images") as $item) {

    if (!in_array($item, array(".", ".."))) { //Pulando os valores do array "." e ".."

        unlink("images/" . $item);

    }

}

echo "OK";

?>