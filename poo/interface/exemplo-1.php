<?php

//interface obriga as classes que implementem interfaces que tenham os padoes definidos na interface
//É um contrato que obriga a classe com 'implements' a implementar os metodos definidos na interface
//Obriga a implemnter os metodos com o moderador de acesso, nome e parametros definidos na interface
//Uma classe pode implementar varias interface (add ',')
//interfaces não podem ter atributos/variabeis
//interface ajuda no trabalho em equipe e na organização do código
//usado em documentação de API

interface Veiculo {

   public function acelerar($velocidade);
    public function freiar($velocidade);
    public function trocarMarcha($marcha);
    
}

class Civic implements Veiculo {

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

$carro = new Civic();

$carro->trocarMarcha(1);

?>