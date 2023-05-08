<?php

if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    //Fução para evitar o cammand injection 'escapeshellcmd'--
    //--quando se utiliza funções de sistema como a função 'system' 
    $cmd = escapeshellcmd($_POST["cmd"]);

    var_dump($cmd);

    echo "<pre>";

    $comando = system("dir C:", $retorno);

    echo "</pre>";

}

?>

<form method="post">

    <input type="text" name="cmd">
    <button type="submit">Enviar</button>

</form>