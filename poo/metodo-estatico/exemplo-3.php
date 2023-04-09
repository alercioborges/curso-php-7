    <?php

//Metodo estatico serve para organizar a estrutura da classe
//É um metodo que pode ser chamado dentro da propria classe em que ele é criado (organização)

//Não é necessário instanciar a classe onde este metodo ou atributo foi criado--
//--para chamar metodo ou acessar o atributo (static)
//É posivel chmamar os metodos e acessar os atributos de fora do contexto

class Documento {

    private $numero;

    public function getNumero(){

        return $this->numero;

    }

    public function setNumero($numero){

        $resultado = Documento::validarCPF($numero); //acesssando o metodo da propria classe
                                                     //[NOME DA CLASSE]:[NOME DO METODO]

        if ($resultado === false) {

            throw new Exception("CPF informado não é válido.", 1);

        }

        $this->numero = $numero;

    }

    //mátodo estatico
    public static function validarCPF($cpf):bool{ //forçanso o retorno a ser um boolean (tru ou false)

        if(empty($cpf)) {
            return false;
        }
     
        $cpf = preg_match('/[0-9]/', $cpf)?$cpf:0;
    
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
         
        
        if (strlen($cpf) != 11) {
            echo "length";
            return false;
        }
        
        else if ($cpf == '00000000000' || 
            $cpf == '11111111111' || 
            $cpf == '22222222222' || 
            $cpf == '33333333333' || 
            $cpf == '44444444444' || 
            $cpf == '55555555555' || 
            $cpf == '66666666666' || 
            $cpf == '77777777777' || 
            $cpf == '88888888888' || 
            $cpf == '99999999999') {
            return false;
    
         } else {   
             
            for ($t = 9; $t < 11; $t++) {
                 
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    return false;
                }
            }
     
            return true;
        }

    }

}

//Duas formas

//Primeira
/*
$cpf = new Documento();
$cpf->setNumero("87867147241");

var_dump($cpf->getNumero());
*/


//Segunda
var_dump(Documento::validarCPF("87867147241"));

?>