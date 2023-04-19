<?php


spl_autoload_register(function($class_name){

    //'DIRECTORY_SEPARATOR' utiliza o caracter de separação de diretorios--
    //--independente do usado pelo SO (linus, win..)
    $filename = 'class' . DIRECTORY_SEPARATOR . $class_name.".php";

    if (file_exists(($filename))) {

        require_once($filename);

    }

});

define('DSN', 'mysql');
define('HOST','127.0.0.1');
define('DBUSER', 'curso-php-7');
define('DBPASS', 'passcursophp7');
define('DBNAME', 'curso-php-7');

?>