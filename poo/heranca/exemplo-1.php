<?php

//Herança serve para evitar a redundancia de metodos e atributos e organizar a estrutura
//Classe base (pai) / classe especifica (filha) que estende a classe pai
//A classe filho pode acessar os metodos e atributos da clase pai--
//--mas a clase pai ão acessa os metodos e atributos da clase filho

class Documento {

    private $numero;

    public function getNumero() {

        return $this->numero;

    }

    public function setNumero($n) {

        $this->numero = $n;

    }

}

class CPF extends Documento { //comando 'extends' faz a herança acontecer

    public function validar():bool {

        $numeroCPF = $this->getNumero();

        return true;

    }

}

$doc = new CPF();

$doc->setNumero("111222333-44");

var_dump($doc->validar());

echo "<br/>";

echo $doc->getNumero();

?>