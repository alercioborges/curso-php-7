<?php

require_once("connection.php");

$result = $con->query("SELECT * FROM tb_user");

$data = [];

while ($row = $result->fetch_assoc()) { //Enquanto existeir registro na tabela
	array_push($data, $row); //01 array ($data) de arrays ($row)
}

echo json_encode($data);

?>