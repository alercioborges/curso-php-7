<?php 

//Forçar que gere um id de sessão direfente

require_once("index.php");

echo "Dunção regenerate_id <br><br>";

//gere um id de sessão direfente
session_regenerate_id();

echo "Função ession_regenerate_id <br>";
echo session_id();


?>