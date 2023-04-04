<?php

echo "Constantes <br /><br />";

//A função 'define' é usada para declarar constantes
//diferente dos dados recebidos por das variavai,
//os dados recebidos pelas constantes não mudam
//usado para idiomas, IP's, diretórios...

//definindo uma constante
define("SERVIDOR", "127.0.0.1");

//Exibindo uma constante
echo SERVIDOR;
echo "<br /><br /	>";

//criando uma constante de array
define("BANCO_DE_DADOS", [
	'127.0.0.1',
	'dbuser',
	'password',
	'dbname'
]);

//Exibindo constante de array
echo "Constante de array <br />";
echo "<pre>"; print_r(BANCO_DE_DADOS); echo "</pre>";

//Exibindos os dados da constante de array individualmente
echo "constante de array individualmente <br />";
echo BANCO_DE_DADOS[0] . " - " . BANCO_DE_DADOS[1] . "<br /><br />";

//Por padrão as constantes são definidas com letras mauisculas
//Para que a constante seja case-insensitive (letras maisculas e miusculas)
//adicionar no final da função o parametro 'true'
/*
define("GREETING", "Hello you.", true);
echo GREETING; // outputs "Hello you."
echo greeting; // outputs "Hello you."
*/

//Exibindo constantes nativas do PHP
//https://www.php.net/manual/pt_BR/reserved.constants.php
echo "Constantes nativas do PHP <br />";
echo PHP_VERSION . "<br />";
echo PHP_MAJOR_VERSION . "<br />";
echo PHP_MINOR_VERSION . "<br />";
echo PHP_RELEASE_VERSION . "<br />";
echo PHP_VERSION_ID . "<br />";
echo PHP_EXTRA_VERSION . "<br />";
echo PHP_FLOAT_MIN . "<br />";
echo PHP_FLOAT_MAX . "<br />";
echo DEFAULT_INCLUDE_PATH . "<br />";


?>