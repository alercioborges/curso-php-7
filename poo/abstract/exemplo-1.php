<?php

interface Veiculo {

    public function acelerar($velocidade);
    public function freiar($velocidade);
    public function trocarMarcha($marcha);
    
}

//Classe abstrata (abstract) servem somente para serem extendidadas por outra classe
//Não é possivel instanciar uma classe do tipo abstrata
//Diferente da interface, uma classe abstrata pode implementar métodos
//Só é possivel fazer um 'extends' nas classes filho---
//--mas é possivel uma classe implementar varias interfaces
//Não obriga as classes que estenda a classe abstrata a implemetar os métodos
//É uma forma de organização do código


abstract class Automovel implements Veiculo {

    public function acelerar($velocidade){

        echo "O veículo acelerou até " . $velocidade . "km/h";

    }

    public function freiar($velocidade){

        echo "O veículo freiou até " . $velocidade . "km/h";

    }

    public function trocarMarcha($marcha){

        echo "O veículo engatou a marcha " . $marcha;

    }

}

class DelRey extends Automovel {

    public function empurrar(){



    }

}

$carro = new DelRey();

$carro->acelerar(200);

?>