<?php

$email = $_POST["inputEmail"]; //recebendo o input de email do formulario

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
    "secret"=>"6LfV2hgUAAAAAGA0iygfMNS9vUQ7liCTkyju1y3T", //chave do recaptcha
    "response"=>$_POST["g-recaptcha-response"],
    "remoteip"=>$_SERVER["REMOTE_ADDR"] //IP do usuário
)));

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$recaptcha = json_decode(curl_exec($ch), true); //passando para um array

curl_close($ch);

if ($recaptcha["success"] === true) { //verif. se a operação retornou "true"

    echo "OK: ".$_POST["inputEmail"];

} else {

    header("Location: exemplo-4.php");

}

?>