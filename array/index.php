<?php 

//Declarando um array e adicionando valor nele
$array = array('uva', 'maça', 'pêra', 'melancia');

echo "dados do array <br />";
var_dump($array);

echo "<br /><br />";

//todo array inicia em 0
//quando o array tem uma só dimensão é chamado de vetor

/* Array bidimencional */

$carro[0][0] = "GM";
$carro[0][1] = "Corsa";
$carro[0][2] = "Celta";
$carro[0][3] = "Prisma";
$carro[0][4] = "Camaro";

$carro[1][0] = "Ford";
$carro[1][1] = "Fiesta";
$carro[1][2] = "Fusion";
$carro[1][3] = "Focus";

echo "Dados do array de carros <pre>";
print_r($carro);
echo "</pre><br />";

//exibindo separadamente os dados do array bidimensional
echo $carro[0][1];
echo "<br /><br />";

//comando "end" traz o último dado que tem nesta posição
echo end($carro[0]);
echo "<br />";
echo end($carro[1]);
echo "<br /><br />";

//comando "array_keys"
echo "Comando array_keys <br />";
print_r(array_keys($carro));
echo "<br /><br />";


//Comando "kay" traz o valor da última dimensão
echo "Comando kay <br />";
echo key($carro[0]);
echo "<br />";
echo key($carro[1]);
echo "<br />";


/*********************************/

echo "função array_push <br />";
$pessoas = [];

array_push($pessoas, array(
    'nome' => 'Alercio',
    'idade' => '34',
    'cpf' => '12345678123'
    )
);

array_push($pessoas, array(
    'nome' => 'Maria',
    'idade' => '54',
    'cpf' => '55345678123'
    )
);

echo "<pre>"; print_r($pessoas); echo "</pre>";

print_r($pessoas[0]);
echo "<br />";
echo $pessoas[1]['nome'];






?>