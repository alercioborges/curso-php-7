<?php

//** è necessario instalar a biblioteca GD no Linux e gabilita-la no php.ini **//

//Mudando o tipo de resposta do arquivo (imagem/extenção pmg)
header("Content-Type: image/png");

//Função que cria a imagem
//Recebe como param. o tamnhanho da imagem
$image = imagecreate(256, 256);

//Definindo as cores que serão usadas na imagem
//A primerira cor definida será a cor de fundo da imagem
$black = imagecolorallocate($image, 0, 0, 0); //padrão rgb
$red = imagecolorallocate($image, 255, 0, 0);

//Definindo como será exibido a imagem
imagestring($image, 5, 60, 120, "Curso de PHP 7", $red);

//Exibindo a imagem
imagepng($image);

//Fechando a criação da imagem
imagedestroy($image);

?>