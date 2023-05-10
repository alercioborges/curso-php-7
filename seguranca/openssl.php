<?php

//Usada nas versões do PHP 7.2.0 para cima

define('SECRET_IV', pack('a16', 'senha')); //função 'pack' pasaa para base 16
define('SECRET', pack('a16', 'senha'));

$data = [
    "nome"=>"Hcode"
];

//Encrypttografando com a função 'openssl_encrypt'
$openssl = openssl_encrypt (
    json_encode($data),
    'AES-128-CBC',
    SECRET,
    0,
    SECRET_IV
);

echo $openssl;

echo "<br><br>";

//Descriptografando com a função 'openssl_decrypt'
$string = openssl_decrypt($openssl, 'AES-128-CBC', SECRET, 0, SECRET_IV);

var_dump(json_decode($string, true));

?>