<?php

namespace Ecommerce\Model;

use \Ecommerce\DB\Sql; // A primeira "\" refere-se "A partir da raiz"

use \Ecommerce\Model;

class User extends Model{

	public static fuction login($login, $password){

		$sql = new SQL();

		$result = $sql->select("SELECT deslogin FROM tb_users WHERE deslogin, despassword = :LOGIN", array(':LOGIN' => $login));

		if (count($result) == 0) {
		 	//Necessário '\' no "Exception" para referenciar qu é a classe principal
			throw new \Exception("Nome de usuário ou senha errados.");			

		 }

		 $data = $result[0];

		 //Função que retorno bool
		if (password_verify($password, $data["despassword"]) == true){

			$user = new User();

			$user->setDeslogin($data['deslogin'];

		} else {
			throw new \Exception("Nome de usuário ou senha errados.");
		}

	}

}

?>