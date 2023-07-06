<?php

namespace Ecommerce\Model;

use \Ecommerce\DB\Sql; // A primeira "\" refere-se "A partir da raiz"

use \Ecommerce\Model;

class User extends Model{

	const SESSION = "User";

	public static function login($login, $password){

		$sql = new SQL();

		$result = $sql->select("SELECT * FROM tb_users WHERE deslogin = :LOGIN", array(':LOGIN' => $login));

		if (count($result) == 0) {
		 	//Necessário '\' no "Exception" para referenciar qu é a classe principal
			throw new \Exception("Nome de usuário ou senha errados.");			

		}

		$data = $result[0];

		//Verifica se o primeiro parametro é igual a hash do segundo
		 //Função que retorno bool
		if (password_verify($password, $data["despassword"]) == true){

			$user = new User();
			$user->setdeslogin($data['deslogin']);

			$user->setData($data);

			$_SESSION[User::SESSION] = $user->getValues();

			return $user;

		} else {

			throw new \Exception("Nome de usuário ou senha errados.");
		}
	}

	public static function verifyLogin($idAdmin = true) {

		if (
			!isset($_SESSION[User::SESSION])
			||
			!$_SESSION[User::SESSION]
			||
			!(int)$_SESSION[User::SESSION]["iduser"] > 0
			||
			(bool)$_SESSION[User::SESSION]["inadmin"] !== $idAdmin
		) {
			header('Location: ./admin/login');
			exit;

		}
	}

	public static function logout() {
		$_SESSION[User::SESSION] = NULL;
	}

}

?>