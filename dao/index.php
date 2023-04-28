<?php

require_once("config.php");

/*
//Método 'select' (LISTA DE USUÁRIOS)
$sql = new Sql();

$usuarios = $sql->select("SELECT * FROM tb_user");

echo json_encode($usuarios);
*/

/*
//Exibindo usuário via ID passado por paramentrp
$user = new Usuario();

$user->loadById(48);

echo $user;
*/

/*
//Listando todos os usuário e exibindo em um json
//utilizando Método estático--
//--(ñ necessario instanciar a classe onde o método foi implem.)
$list = Usuario::getList();
echo json_encode($list);
*/

/*
$search = Usuario::searchUserByUsername("stdalercio");
echo json_encode($search);
*/

/*
$login = new Usuario();
$login->login("marinaruy", "gsdfghgdsfhh");

echo $login;
*/

/*
//INSERINDO NOVO USÚARIO
$student = new Usuario();

$student->setUsername("absqggg5");
$student->setEmail("abs@email.comg");
$student->setFirstname("Alercio");
$student->setLastname("stdalercio");
$student->setPass("qwert");

$student->insert();

$search = Usuario::searchUserByEmail($student->getEmail());
echo json_encode($search);
*/



$checkUser = Usuario::checkUserExists("absqggg5f", "abs@email.comg");
print_r($checkUser);







?>