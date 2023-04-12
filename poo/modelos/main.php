<?php

include_once 'class_carro.php';

$carro = new Carro("Corse", "2021", "Carro", "Placa",);

var_dump($carro);

echo "<br /><br />";


echo $carro->getModelo() . "<br />";
echo $carro->getAno(). "<br />";
echo $carro->tipo . "<br />";
echo $carro->itemDeIdentificacao . "<br />";



include_once 'class_usuario.php';

echo '<br />' . 'Classe usuario' . '<br />';

$usuario = new Usuario();

$usuario->setNomeUsuario('Alercio');
$usuario->setIdnumber('12341234');

echo '<pre>';
var_dump($usuario);
echo '</pre>';



?>