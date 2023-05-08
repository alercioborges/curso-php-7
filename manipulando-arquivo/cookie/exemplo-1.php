<?php

//cookie = arquivo de texto de pequeno tamanho que é criado na maquina do usuário quando acessa determoinadas função da aplicação 

$data = array(

    "empresa" => "Hcode Treinamentos"

);

//Função que cria cookies 'setcookie'
setcookie("NOME_DO_COOKIE", json_encode($data), time() + 3600); //tempo em timestamp (segundos)
            //obrigatório definir tempo de dutação do cookie
            //caso contratio, ao fechar o navegador, o coohie é deletado

echo "OK, cookie gerado";

?>