<?php

//Encapsulamento: modificador de acesso
//Encapsulamento: proteger métodos e atributos

/*
Public: Com este modificador, o acesso é livre em qualquer lugar do programa.

Private: Com este modificador, o acesso é permitido somente dentro da classe onde ele foi declarado. Por padrão, é a visibilidade definida para métodos e atributos em uma classe.
    
Protected: Com este modificador, apenas a classe que contém o modificador e os tipos derivados dessa classe tem o acesso.
*/

class Pessoa {

    public $nome = "Rasmus";
    protected $idade = 48;
    private $senha = "12345";

    public function verDados(){

        echo $this->nome . "<br/>";
        echo $this->idade . "<br/>";
        echo $this->senha . "<br/>";

    }

}

$objeto = new Pessoa();

//echo $objeto->nome . "<br/>";

$objeto->verDados();

?>