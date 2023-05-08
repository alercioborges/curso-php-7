<?php


//Arrau super-global $_COOKIE[]
if (isset($_COOKIE["NOME_DO_COOKIE"])) { //Verf. se o cookie "NOME_DO_COOKIE" existe

    var_dump(json_decode($_COOKIE["NOME_DO_COOKIE"])); //exibindo os dados do cookie
    
    echo "<br/>";//Coloquei esse br para quebrar a linha para visualizar melhor os dois exemplos

    //Acessando o valor de cookie como onjeto
    $obj = json_decode($_COOKIE["NOME_DO_COOKIE"]); 

    echo $obj->empresa;

}

?>