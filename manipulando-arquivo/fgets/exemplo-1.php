<?php

$filename = "usuarios.csv"; //Caminho/nome do arquivo

if (file_exists($filename)) { //Verig. se o arquivo está na pasta

    $file = fopen($filename, "r"); //abrindo e e lendo o arquivo

    //Função que lê o arquivo 'fgets'
    $headers = explode(",", fgets($file)); //Separando em um array via ','

    $data = array();

    while ($row = fgets($file)) { //Percorrendo o arquivo

        $rowData = explode(",", $row);
        $linha = array();

        for ($i = 0; $i < count($headers); $i++) {

            $linha[$headers[$i]] = $rowData[$i];

        }

        array_push($data, $linha);

    }

    fclose($file); //Fechando o arquivo na memória

    echo json_encode($data); //Tranf. o array em json

}

?>