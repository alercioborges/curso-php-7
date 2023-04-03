<?php

echo "Operadores <br /><br />";

//operador de agregação
$nome = "Alercio";
echo "{$nome}<br /><br />";

//Concatenação e aguegação
$nome .= " Borges da Silva";
echo "{$nome}<br /><br />";

//Agregação e soma, subtração e porcentagem
$valorTotal = 0;
$valorTotal += 100;
$valorTotal += 25;
$valorTotal -= 83;
$valorTotal *= .9; //90% do valor 

echo "{$valorTotal}<br /><br />";

//resto da divisão %
echo 11 % 2; //resultado 1
echo "<br /><br />";

//Potenciação **
echo 10 ** 2; //resultado 100 - 10 elevado ao quadrado
echo "<br /><br />";

//Operadores de comparação
echo "> maior que <br>";
echo "< menor que <br>";
echo "= atribuição <br>";
echo "== comparação (sem ver o tipo) <br>";
echo "=== comparação e se é do mesmo tipo <br>";
echo "!= diferente (sem ver o tipo) <br>";
echo "!== diferente e se é do tipo diferente <br /><br />";

//spaceship
var_dump(83 <=> 47); //retorna 1 - o 1ª num é > q o 2ª
echo "<br>";
var_dump(47 <=> 83); //retrona -1 - o 1ª num é < q o 2ª
echo "<br>";
var_dump(47 <=> 47); //retrona 0 - os num são iquais
echo "<br /><br />";

//Operador Null Coalesce de comparação '??'
$val01 = Null;
$val02 = Null;
$val03 = 99;

//Se '$val01' não exixtir/for null exibe o proximo 
echo $val01 ?? $val02 ?? $val04 ?? $val03;
echo "<br /><br />";

//Operador de incremento '++'
$incremento = 1;
$incremento++; //adiciona mais 1 - '++''
//pre incremento ++$incremento
echo $incremento; //retorna 2
echo "<br /><br />";

//Operador de decremento '--'
$decremento = 2;
$decremento--; //subtrai 1 - '--'
//pre decremento --$incremento
echo $decremento; //retorna 1


?>