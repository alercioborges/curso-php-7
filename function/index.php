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

echo "<pre>"; print_r(mensagem_dois("Alercio", "21-04-1989", 34)); echo "</pre>";


?>