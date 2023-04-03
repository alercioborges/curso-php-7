<?php 

echo "Exemplo foreach <br /><br />";

//percorre array ou coleções

$meses = array('Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');

var_dump($meses);
echo "<br /><br />";

		 //array    //index    //valor
foreach ($meses as $posicao => $mes) {
	echo "A posiçãp do vetor é: $posicao <br>";
	echo "O mês é: $mes <br><br>";
}

echo "Exemplo 02 foreach <br /><br />";

?>

<!DOCTYPE html>
<html>
<head>
	<title>FOREACH</title>
</head>
<body>
	<form>
		<div>
			<input type="text" name="nome" >
		</div>
		<div>
			<input type="date" name="datanascimento">
		</div>
		<div>
			<input type="submit" value="Enviar">
		</div>
	</form>

	<?php 
		//method pagrão é via get
		//action padrão é propria página
	if (isset($_GET)) {

		foreach ($_GET as $key => $value) {
			echo "O nome do campo é: $key <br>";
			echo "O valor do campo é: $value <br>";
		}
		
	}
	?>

</body>
</html>