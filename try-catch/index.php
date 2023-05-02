<?php

echo "Função 'try-catch' <br><br>";

//Fumção para tratamento de erros


try {

	//Gerabdo/definindo uma exceção (erro)
	//O param. "1" serve para ident. o erro (possivel uso de relação de erros)
	throw new Exception("Houve um erro", 1);
	
	
} catch (Exception $e) { //Padrão usae variavel '$e'
						//'$e' recebendo objeto 'Exception'
	//A função "catch" é obrigatório ao usar o "try"
	//Captura as exceções (erros) do "try"

echo json_encode(array(
		'message' => $e->getMessage(), //msg de erro
		'line' => $e->getLine(), //Linha em q apareceu o erro
		'file' => $e->getFile(), //em qual arquivo deu erro
		'code' => $e->getCode(), //código do erro passadp por param.
		'trace' => $e->getTrace() //Obtém o rastreamento de pilha

	));	

}

echo "<br><br>";

echo "Exemplo 02<br><br>";

function setName($name){

	if(!$name){ //Se não for passado o nome
		throw new Exception("Nome não informado", 1001);
	}

	echo "Nome passado: {$name}<br>";

}

try {
	setName('Alercio');
	setName('');
	
} catch (Exception $e) {
	echo $e;

	
} finally { //Bloco 'finally' é opcopnal
			//É executado independ. se foi executado o 'try' ou 'catch'

echo "<br>Bloco 'finally' executado<br><br>";

}

echo "<br><br>";

function setIdade($idade){

	if (!is_int($idade)) {
		throw new Exception("Dado de idade incorreta", 15);
		
	}

	echo "A idade é: {$idade} <br>";
}

try {
	setIdade(14);
	setIdade("onze");

	
} catch (Exception $e) {
	echo $e->getMessage(); 
	
}

echo "<br><br>";

function setProfissao($profissao){

	if (!is_string($profissao)) {
		throw new Exception("Não inseriu uuma String", 155);
		
	}

	echo "A profissão é: {$profissao} <br>";
}

setProfissao("Médico");
setProfissao(54);




?>