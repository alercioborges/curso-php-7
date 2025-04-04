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

//Função recursiva
echo  "<br><br>Função recursiva <br>";

function factorial($n) {
	if ($n == 0) {
		return 1;
	} else {
		return $n * factorial($n - 1);
	}
}

// Call the function with an argument
echo factorial(5); // Output: 120

/**************************************************************************************/

//Outro exemplo de função recursiva
echo  "<br><br>Outro exemplo de função recursiva <br>";


$hierarquia = array(

	array(
		'nome_cargo'=>'CEO',
		'subordinados'=>array(
            //Inicio: Diretor Comercial
			array(
				'nome_cargo'=>'Diretor Comercial',
				'subordinados'=>array(
                    //Inicio: Gerente de Vendas
					array(
						'nome_cargo'=>'Gerente de Vendas'
					)
                    //Termino: Gerente de Vendas    
				)
			),
            //Termino: Diretor Comercial
            //Inicio: Diretor Financeiro
			array(
				'nome_cargo'=>'Diretor Financeiro',
				'subordinados'=>array(
                    //Inicio: Gerente de Contas a Pagar
					array(
						'nome_cargo'=>'Gerente de Contas a Pagar',
						'subordinados'=>array(
                            //Inicio: Supervisor de Pagamentos
							array(
								'nome_cargo'=>'Supervisor de Pagamentos'
							)
                            //Termino: Supervisor de Pagamentos
						)
					),
                    //Termino: Gerente de Contas a Pagar
                    //Inicio: Gerente de Compras
					array(
						'nome_cargo'=>'Gerente de Compras',
						'subordinados'=>array(
                            //Inicio: Supervisor de Suprimentos
							array(
								'nome_cargo'=>'Supervisor de Suprimentos'
							)
                            //Termino: Supervisor de Suprimentos
						)

					)
                    //Termino: Gerente de Compras
				)
			)
            //Termino: Diretor Financeiro
		)
	)

);

function exibe($cargos){

	$html = '<ul>';

	foreach ($cargos as $cargo) {

		$html .= "<li>";

		$html .= $cargo[ 'nome_cargo' ];

		if (isset($cargo['subordinados']) && count($cargo['subordinados']) > 0) {

			$html .= exibe($cargo['subordinados']);

		}

		$html .= "</li>";

	}

	$html .= "</ul>";

	return $html;

}

echo exibe($hierarquia);

____________________________________________________________________

//Documentação de função

/**
 * Descrição breve da função.
 *
 * Descrição detalhada opcional explicando o propósito da função.
 *
 * @param tipo $nomeParâmetro Descrição do parâmetro.
 * @param tipo $nomeParâmetro2 Descrição do segundo parâmetro (se houver).
 * @return tipo Descrição do que a função retorna.
 */
function minhaFuncao(string $nome, int $idade): string {
    return "Nome: $nome, Idade: $idade";
}

// Exemplo completo

/**
 * Gera uma mensagem de boas-vindas personalizada.
 *
 * Essa função recebe um nome e uma idade e retorna uma string formatada.
 *
 * @param string $nome Nome da pessoa.
 * @param int $idade Idade da pessoa.
 * @return string Mensagem de boas-vindas.
 */
function gerarMensagem(string $nome, int $idade): string {
    return "Bem-vindo, $nome! Você tem $idade anos.";
}

_______________________________________________________________________






?>