<?php 

require_once 'connection.php';

$stmt = $con->prepare("SELECT * FROM tb_user");

$stmt->execute();

$results = $stmt->fetchALL(PDO::FETCH_ASSOC);

$data = [];

foreach ($results as $row) {
	array_push($data, $row); //01 array ($data) de arrays ($row)

	foreach ($row as $key => $value) {
		echo "<strong>".$key.": </strong>".$value."<br>" ;
	}

	echo "----------------------------------------------<br>";
}

echo json_encode($data);

?>