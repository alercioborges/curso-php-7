<?php

spl_autoload_register(function($nameClass){ //Função recebe nome da classe chamada "$nameClass"

    $dirClass = "class"; //Pasta onde deve procurar as classes

    $filename = $dirClass . DIRECTORY_SEPARATOR . $nameClass . ".php"; //Caminho p/ o arquivo

    if (file_exists($filename)) { //Verif. se o arquibo existe

        require_once($filename); //Incluisndo no código

    }

});

?>