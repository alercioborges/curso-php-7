<?php

class Pessoa {

    public $nome;//Atributo

    public function falar() {//Método

        return "O meu nome é ".$this->nome; //$this-> referencia ao atributo ou método da classe
    
    }

}

$marcus = new Pessoa(); 
$marcus->nome = "Marcus Ribeiro";
echo $marcus->falar();

?>