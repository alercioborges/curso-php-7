<?php

echo md5("Alercio");

echo "<br><br>";

echo base64_encode("Alercio");

echo "<br><br>";

echo base64_decode("QWxlcmNpbw==");

echo "<br><br>";

$senha_inserida = "Trocar@123";
$senha_hash = '$2y$10$gpGji2XlY7A5a0yFxiXbWOlcqohojwO7bSu2myxmtfXnJ57QNhpSO';

echo password_hash($senha_inserida, PASSWORD_DEFAULT);

echo "<br><br>";

var_dump(password_verify($senha_inserida, $senha_hash));

echo "<br><br>";

if (password_verify($senha_inserida, $senha_hash)) {
	echo "Senha correta<br><br>";
} else {
	echo "Senha incorreta<br><br>";
}

echo "<br><br>";

$options = ['cost' => 12];

$senha = "qwert";

echo password_hash($senha, PASSWORD_DEFAULT, $options);

echo "<br><br>";



?>