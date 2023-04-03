<?php

echo "exemplo de if <br /><br />";

$minhaIdade = 17;

$bebe = 1;
$crianca = 12;
$adolecente = 17;
$adulto = 65;
$idoso = 66;

if ($minhaIdade <= 1) {
	echo "Bebê";
} else if ($minhaIdade <= $crianca) {
	echo "Criança";
} else if ($minhaIdade <= $adolecente) {
	echo "Adolecente";
} else if ($minhaIdade <= $adulto) {
	echo "Adulto";
} else {
	echo "Idoso";
}

echo "<br /><br />";

$maiorDeIdade = 18;

//para condições simples
//? - 'estão'
//: - 'senão'
echo ($minhaIdade <= $maiorDeIdade)?"Menor de idade":"Maior de idade";
	  //condição                  //?=então        //:=senão

?>