<?php

//função para manupulação de erros 'error_handler'
function error_handler($code, $message, $file, $line){

    //Passando os valores recebido por param. em um aray de json
    echo json_encode(array(
        "code" => $code,
        "message" => $message,
        "file" => $file,
        "line" => $line
    ));

}

//Definindo a função a ser executada caso der erro
set_error_handler("error_handler"); //Recebe como param. o nome da função criada

//testando um erro
$total = 100 / 0; //divisão por zero

?>