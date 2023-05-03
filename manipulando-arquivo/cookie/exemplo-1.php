<?php

//cookie = arquivo de texto de pequeno tamanho que é criado na maquina do usuário quando acessa determoinadas função da aplicação 

$data = array(

    "empresa"=>"Hcode Treinamentos"

);

setcookie("NOME_DO_COOKIE", json_encode($data), time() + 3600);

echo "OK";

?>