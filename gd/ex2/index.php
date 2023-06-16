<?php

//Funçao que importa um atquibo de imagem de extensão jpeg/jpg
$image = imagecreatefromjpeg("certificado.jpg");

$titleColor = imagecolorallocate($image, 0, 0, 0);
$gray = imagecolorallocate($image, 100, 100, 100);

imagestring($image, 5, 450, 150, "CERTIFICADO", $titleColor);
imagestring($image, 5, 440, 350, "Divanei Aparecido", $titleColor);
imagestring($image, 3, 440, 370, utf8_decode("Concluído em.").date("d/m/Y"), $titleColor);

header("Content-Type: image/jpg");

$filename = "certificado-".date("d-m-Y-H-i-s").".jpg";

imagejpeg($image, $filename, 10); //Param. 10 - resolução/qualidade da imagem de 0 a 100

//echo "<img src=" . "http://localhost/curso-php-7/gd/" . $filename . '>';

imagedestroy($image);

?>