<?php

namespace Ecommerce\Model;

use \Ecommerce\Model;
use \Ecommerce\DB\Sql;

class User extends Model{

	const SESSION = "User";

	public static function login($login, $password){

		$sql = new SQL();

		$result = $sql->select("SELECT * FROM tb_users u INNER JOIN tb_persons p USING(idperson) WHERE u.deslogin = :LOGIN", array(':LOGIN' => $login));

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
			header("Location: " . \Ecommerce\Config::getWwwroot() . "/admin/login");
			exit;
		}
	}

	public static function logout() {
		$_SESSION[User::SESSION] = NULL;
	}

	public static function listAll(){

		$sql = new SQL();

		return $sql->select("SELECT * FROM tb_users u INNER JOIN tb_persons p USING(idperson) ORDER BY p.desperson");

	}

	public static function getUserById($iduser){

		$sql = new SQL();

		return $sql->select("SELECT * FROM tb_users u INNER JOIN tb_persons p USING(idperson) WHERE u.iduser = {$iduser}");

	}

	public function createUser() {

		$deslogin = $_POST['deslogin'];
		$desemail = strtolower($_POST['desemail']);
		$desperson = strtoupper($_POST['desperson']);
		$despassword = $_POST['despassword'];
		$nrphone = $_POST['nrphone'];
		$inadmin = $_POST['inadmin'];

		$sql = new Sql();
		
		$stmt = $sql->query("CALL sp_users_save(:desperson, :deslogin, :despassword, :desemail, :nrphone, :inadmin)", array(
			":desperson" => $desperson,
			":deslogin" => $deslogin,
			":despassword" => $despassword,
			":desemail" => $desemail,
			":nrphone" => $nrphone,
			":inadmin" => $inadmin
		));
	}

	public function get($iduser){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_users u INNER JOIN tb_persons p USING(idperson) WHERE u.iduser = :iduser", array(':iduser' => $iduser));

		$this->setData($results[0]);

	}

	public function update($iduser){

		$deslogin = $_POST['deslogin'];
		$desemail = strtolower($_POST['desemail']);
		$desperson = strtoupper($_POST['desperson']);
		$nrphone = $_POST['nrphone'];
		$inadmin = $_POST['inadmin'];

		$sql = new Sql();
		
		$stmt = $sql->query("CALL sp_usersupdate_save(:iduser, :desperson, :deslogin, :desemail, :nrphone, :inadmin)", array(
			":iduser" => $iduser,
			":desperson" => $desperson,
			":deslogin" => $deslogin,
			":desemail" => $desemail,
			":nrphone" => $nrphone,
			":inadmin" => $inadmin
		));

	}

	public function delete($iduser){

		$sql = new Sql();

		$sql->query("CALL sp_users_delete(:iduser)", array(':iduser' => $iduser));

	}


}

?>