<?php

$names = [
	"Miguel",
	"Arthur",
	"Gael",
	"Théo",
	"Heitor",
	"Ravi",
	"Davi",
	"Bernardo",
	"Noah",
	"Gabriel",
	"Samuel",
	"Pedro",
	"Anthony",
	"Isaac",
	"Benício",
	"Benjamin",
	"Matheus",
	"Lucas",
	"Joaquim",
	"Nicolas",
	"Lucca",
	"Lorenzo",
	"Henrique",
	"João Miguel",
	"Rafael",
	"Henry",
	"Murilo",
	"Levi",
	"Guilherme",
	"Vicente",
	"Felipe",
	"Bryan",
	"Matteo",
	"Bento",
	"João Pedro",
	"Pietro",
	"Leonardo",
	"Daniel",
	"Gustavo",
	"Pedro Henrique",
	"João Lucas",
	"Emanuel",
	"João",
	"Caleb",
	"Davi Lucca",
	"Antônio",
	"Eduardo",
	"Enrico",
	"Caio",
	"José",
	"Enzo Gabriel",
	"Augusto",
	"Mathias",
	"Vitor",
	"Enzo",
	"Cauã",
	"Francisco",
	"Rael",
	"João Guilherme",
	"Thomas",
	"Yuri",
	"Yan",
	"Anthony Gabriel",
	"Oliver",
	"Otávio",
	"João Gabriel",
	"Nathan",
	"Davi Lucas",
	"Vinícius",
	"Theodoro",
	"Valentim",
	"Ryan",
	"Luiz Miguel",
	"Arthur Miguel",
	"João Vitor",
	"Léonovo",
	"Ravi Lucca",
	"Apollo",
	"Thiago",
	"Tomás",
	"Martin",
	"José Miguel",
	"Erick",
	"Liam",
	"Josué",
	"Luan",
	"Asafe",
	"Raul",
	"José Pedro",
	"Dominic",
	"Kauê",
	"Kalel",
	"Luiz Henrique",
	"Dom",
	"Davi Miguel",
	"Estevão",
	"Breno",
	"Davi Luiz",
	"Thales",
	"Israel",
	"Migueliguel",
	"Arthur",
	"Gael",
	"Heitor",
	"Theo",
	"Davi",
	"Gabriel",
	"Bernardo",
	"Samuel",
	"João Miguel",
];

//echo "<pre>"; print_r($names); echo "</pre>";


/*
foreach ($names as $key => $value) {
	echo "INDICE: " . $key . " - Nome: " . $value . "<br>";
}
*/


/*
foreach ($names as $key => $value) {
	if($key <= 10){
		echo "INDICE: " . $key . " - Nome: " . $value . "<br>";
	}
}
*/


//Com uma só variavel, exibe somente os dados. Sem os indices do array
foreach ($names as $value) {
	echo $value . "<br>";
}

?>