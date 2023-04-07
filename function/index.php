<?php

//Funções do usuário

echo "Funções do usuário (function) <br><br>";

echo "Função com valor padrão de parametro <br>";

        		  //Caso não seja passado parametro, serpa exibido o valor padrão
				  //Senão tiver valor padão, é obrigatorio passar valor ao parametro na chamado
function mensagem($texto = "Mensagem padão"){
	return "Leia esta mensagemque é para voccê: {$texto} <br>" ;
}

echo mensagem("Seja bem vindo"); //será evibido o valor deste parametro
echo mensagem(); //será exibido o valor padrão
echo mensagem(""); //não será exibido o valor padrão e nem nada


//Retorna em um array os arumantos passados na chamaas,
//mesmo que a função não pessa (não sendo obrigatório)
echo "<br><br>Função func_get_arg <br>";

function mensagem_dois(){
	$argumentos = func_get_args();
	return $argumentos;
}

echo "<pre>"; print_r(mensagem_dois("Alercio", "21-04-1989", 34)); echo "</pre><br>";

//Função que recebe arametro por referencia de memoria
//Acessa o mesmo ponteiro de memória
echo "Parametro por referencia de memoria<br>";

$valor = 10;

function trocaValor($valorParam){ //U valor do parametro num é o mesmo da variavel acima

	return $valorParam += 50;
}

function trocaValorReferencia(&$valorRefere){ //add & pega o valor da variavel na memoria

	return $valorRefere += 50;
}


echo "Variavael valor: " . $valor . "<br>";
echo "Função trocaValor V1: " . trocaValor($valor) . "<br>";
echo "Função trocaValor V2: " . trocaValor($valor) . "<br>";
echo "Função trocaValorReferencia V1: " . trocaValorReferencia($valor) . "<br>";
echo "Função trocaValorReferencia V2: " . trocaValorReferencia($valor) . "<br>";
echo "<br><br>";

//Decalação de tipos escalaveis de parametro de função

Echo "Função com tipos escalaveis de parametro <br>";

function soma(int ...$valores) {
	return array_sum($valores);
}

echo soma(2,2,2) . "<br><br>";

//Defininsdo o tipo do retrono da função
echo "Tipo de retrono da função <br>";

function somaString(int ...$valores):string { //add ':' e o tipo desejato do retrono
return array_sum($valores);
}

var_dump(somaString(2, 2, 2));
echo "<br><br>";

//Função anonima
echo "Função anonima <br>";

function processando($termino){

	//Início códogo do processamento....

	//... fim do códogo do processamento

	$termino(); //será chamado como sendo uma função
				//dado do parametro
				//declarando como sendo do tipo function
}

processando(function(){
	echo "O processo terminou";
});

echo "<br>";
//Outro tipo de função anomima

$varial_funcao = function($param_variavel){
	var_dump($param_variavel);
};

$varial_funcao("Teste");








?>