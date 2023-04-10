<?php

//polimorfismo é     reescrever os métodos da classe pai (mesmo nome da função)
//Em herança, quando os metodos tem o mesmo nome mas comportamentos diferentes--
//--classe pai tem um metodo com um nome, e a classe filho tem um metodo com o mesmo nome==
//--mas com implementação diferente

abstract class Animal {

    public function falar(){

        return "Som";

    }

    public function mover(){

        return "Anda";

    }

}

class Cachorro extends Animal {

    public function falar(){

        return "Late";

    }

}

class Gato extends Animal {

    public function falar(){

        return "Mia";

    }

}

class Passaro extends Animal {

    public function falar(){

        return "Canta";

    }

    public function mover(){

        return "Voa e " . parent::mover(); //'parent::' chama o metodo ou o atributo da classe pai

    }

}

$pluto = new Cachorro();

echo $pluto->falar() . "<br/>";
echo $pluto->mover() . "<br/>";

echo "-------------------------<br/>";

$garfield = new Gato();

echo $garfield->falar() . "<br/>";
echo $garfield->mover() . "<br/>";

echo "-------------------------<br/>";

$ave = new Passaro();

echo $ave->falar() . "<br/>";
echo $ave->mover() . "<br/>";

?>