<?php

$pessoas = [];

array_push($pessoas, array(
	'nome' => 'Alercio',
	'idade' => '34',
	'cpf' => '12345678123'
));

array_push($pessoas, array(
	'nome' => 'Maria',
	'idade' => '54',
	'cpf' => '55345678123'
));

echo "<pre>"; print_r($pessoas); echo "</pre>";

//função json_encode
//converte um array/vetor em uma lista no formato json
echo "Função json_encode <br/>";
echo json_encode($pessoas);

//função json_decode
//converte uma lista no formato json em um array/vetor
echo "Função json_decode <br/>";
$json = '[{"nome":"Alercio","idade":"34","cpf":"12345678123"},{"nome":"Maria","idade":"54","cpf":"55345678123"}]';t$data = json_decode($json, true); //usar o parametro 'true' para definir como array
							  //caso contrario, ele defenirá como objeto

echo "<pre>"; var_dump($data); echo 	"</pre>";









?>