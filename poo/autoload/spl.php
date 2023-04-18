<?php

//Carrega automaticamente os arquivos com o mesmo nome da classe em que este arquivo está

spl_autoload_register(function($class_name){

    $filename = $class_name.".php";

    if (file_exists(($filename))) {

        require_once($filename);

    }

});

?>