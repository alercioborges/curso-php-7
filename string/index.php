<?php

//diferença entre '' e "" - interpolação
$nome = "Alercio";
$sobrenome = 'Borges da Silva';
$nomeCompleto = "alercio borges da silva";

var_dump($nome, $sobrenome); //não apresenta diferença
echo "<br />";

//com "" é possivel verificar valores de variaveis
echo "Meu nome é $nome $sobrenome <br />";

//com '' exibi exatamente o conteudo
//sem verificar valores de variaveis
//tags html são aceitos
echo 'Meu nome é $nome $sobrenome <br /><br />';

echo "FUNÇÕES PARA STRINGS <br /><br />";

//convertendo caracteres p/ maiusculas
echo strtoupper($nome);
echo "<br />";

//convertendo caracteres p/ minusculas
echo strtolower($sobrenome);
echo "<br />";

//1ª letra de cada palavra fica maiuscula
echo ucwords($nomeCompleto);
echo "<br />";

//1ª letra do texto fica maiuscula
echo ucfirst($nomeCompleto);
echo "<br />";

//Subistitui valores da string
$nomeCompletoAlterado = str_replace("o", "0", $nomeCompleto);
$nomeCompletoAlterado = str_replace("e", "3", $nomeCompletoAlterado);
$nomeCompletoAlterado = str_replace("i", "1", $nomeCompletoAlterado);
$nomeCompletoAlterado = str_replace("a", "4", $nomeCompletoAlterado);
$nomeCompletoAlterado = str_replace("s", "5", $nomeCompletoAlterado);
echo $nomeCompletoAlterado;
echo "<br />";

//verifica a posição da string q começa a palavra pesquisada na string
echo strpos($nomeCompleto, "da");


echo "<br/ ><br /><br />";



$searchString = " ";
$replaceString = "";
$originalString = "alercio borges da silva 4 2 3 4 ! ! @ 2 @ @ l  "; 
 
$outputString = str_replace($searchString, $replaceString, $originalString); 
echo("The original string is: $originalString <br />");  
echo("The string without spaces is: $outputString");


echo "<br/ ><br /><br />";

$string = "5 3 4 5 3 4 f d g 6  5  4 gsdf &¨% ter";
$stringAlt =  preg_replace('/\s+/', '', $string);
echo "string alterada: ".$stringAlt;

?>