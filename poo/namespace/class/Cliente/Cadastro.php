    <?php

//Informando ao PHP qual é a pasta onde está esta classe
//Exite duas classes com o memo nome em diretórios diferentes
//namespace com o mesmo nome da pasta onde o arquivo da classe está
namespace Cliente;

class Cadastro extends \Cadastro { //informando o caminho do arquivo com a classe extendido
                                    // O '\' refere-se a raiz do siretório

    public function registrarVenda(){

        echo "Foi registrada uma venda para o cliente ".$this->getNome();

    }

}

?>