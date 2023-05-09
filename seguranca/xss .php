<form method="post">

    <input type="text" name="busca">
    <button type="submit">Enviar</button>

</form>

<?php

$_POST['busca'] = '<a href="#"><strong>Oi</strong></a><script>alert("ok")</script>';

if (isset($_POST['busca'])) {

    //echo $_POST['busca'];
    echo strip_tags($_POST['busca'], "<strong><a>"); //IMPEDE A EXECUÇÃO DE TAGS HTML
    //echo htmlentities($_POST['busca']);  //exibe as tags HTML como texto  

}

?>