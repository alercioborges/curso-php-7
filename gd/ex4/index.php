<?php

header("Content-Type: image/jpeg");

$file = "wallpaper.jpg";

$new_width = 256;
$new_height = 256;

//Função similar ao array
list($old_width, $old_height) = getimagesize($file); //Função que garda o tamnhanho da imagem

$new_image = imagecreatetruecolor($new_width, $new_height);
$old_image = imagecreatefromjpeg($file);

imagecopyresampled($new_image, $old_image, 0, 0, 0, 0, $new_width, $new_height, $old_width, $old_height);

imagejpeg($new_image);

imagedestroy($old_image);
imagedestroy($new_image);

?>