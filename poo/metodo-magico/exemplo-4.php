<?php

//São métodos executados automaticamente
//Todos os métodos mágicos inicia com '__'
//O método construtor '__construct' é um exemp,o de método mágico


class Endereco {

    private $logradouro;
    private $numero;
    private $cidade;

    public function __construct($a, $b, $c) { //Método mágico construtos
                                              //OBRIGA A PASSAR PARAMETROS AO INSTACIAS O OBJETOS
        $this->logradouro = $a;
        $this->numero = $b;
        $this->cidade = $c;

    }

    //Método mágico '__destruct()' é chamado automaticamente quando--
    //--o objeto é removido da memoria (destruido/finalizado/Página carregada)
    //Ultima coisa a ser executada antes de liberar a memória
    //Ex de uso: desconetar do banco de dados, para registro de log
    public function __destruct(){

        //var_dump("DESTRUIR");

    }

    //Métodos '__toString()' converte p/ Stringo (possivel exibição via 'echo')
    public function __toString(){

        return $this->logradouro.", ".$this->numero." - ".$this->cidade;

    }

}

$meuEndereco = new Endereco("Rua Nossa Senhora de Guadalupe", "260", "São Bernardo");
/*
var_dump($meuEndereco);

unset($meuEndereco); //Chamando o método '__destruct()'
*/

echo $meuEndereco; //usando o método mágico '__toString()'
                   //Objeto sendo exibido via 'echo'

?>