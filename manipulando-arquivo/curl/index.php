<?php

$cep = "01310100";
$link = "https://viacep.com.br/ws/$cep/json/";

//iniciando o curl
$ch = curl_init($link); //Passando a url como param;


//Opções do CURL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //constante q informa q se espera um retorno
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); //constante q deixa de checar se a url tem SSL - ñ necessário

$response = curl_exec($ch); //Recebendo o retorno

curl_close($ch); //Fechando a conexão

$data = json_decode($response, true); //passando o true para virar array (contrario: vira objeto)

print_r($data);

echo "<br><br>" . $data['cep']; 
echo "<br><br>" . $data['logradouro']; 

?>