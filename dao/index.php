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

$student->setUsername("absqggg5gggggghhgg");
$student->setEmail("abs@email.comggggghhgg");
$student->setFirstname("Alercio");
$student->setLastname("stdalercio");
$student->setPass("qwert");

$student->insert();

echo $student;
*/

/*
//Teste do método 'checkUserExists'--
//--que verifica se e-mail ou username já esta cadastrado
$checkUser = Usuario::checkUserExists("absqggg5f", "abs@email.comg");
print_r($checkUser);
*/

/*
//Editando usuário já cadastrado
$user_edited = new Usuario();

//Carregando os dados do usuoario cadastrado no objeto
$user_edited->loadById(111);

//Inserindo os dados do usuoario à serem alterados
$user_edited->update(
			"ssAlercioggggh",
			"ssalercio@ssemail.comhhhh",
			"ssAlercio",
			"ssBorges",
			"gsdfgsdfg"
		);

echo $user_edited;
*/



//Excluíndo usuário
$user_delete = new Usuario();

//Carregando os dados do usuoario cadastrado no objeto
$user_delete->loadById(104);

$user_delete->delete();

echo $user_delete;

?>