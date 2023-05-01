<?php

$dir_name = "images";


//Verifica se o diretório do caminho "$dir_name" existe
if (!is_dir($dir_name)) {

	//Criando o dir. do caminho do param. passado
	//'mk' abrev. de 'make'
	mkdir($dir_name);

	echo "Diretório criado com sucesso - {$dir_name}<br><br>";
	
} else {
	echo "Diretório já existente - {$dir_name}<br><br>";

}


//função "rmdir" exclui o dir.
//rmdir($dir_name);


//Exbide a descrição do conteúdo do dir.
echo "Função 'scandir'<br>";
$desc_images = scandir($dir_name);
echo "<pre>"; var_dump($desc_images); echo "</pre><br><br>";


$data = array();

foreach ($desc_images as $img) {

    if (!in_array($img, array(".", ".."))) { //despeza as posições do array com (".", "..")

        $filename = "images" . DIRECTORY_SEPARATOR . $img;

        $info = pathinfo($filename);

        $info["size"] = filesize($filename);
        $info["modified"] = date("d/m/Y H:i:s", filemtime($filename));
        $info["url"] = "http://localhost/curso-php-7/diretorio/ex1/".str_replace("\\", "/", $filename);

        array_push($data, $info);

    }

}

echo json_encode($data);

echo "<br><br>";

echo "<pre>"; print_r($data); echo "</pre>";


?>