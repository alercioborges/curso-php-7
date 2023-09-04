<?php

namespace Ecommerce\Model;

use \Ecommerce\Model;
use \Ecommerce\DB\Sql;

class User extends Model
{

	const SESSION = "User";
	const SECRET_KEY = 'as987f9df6gsdf87';
	const SECRET_IV = '9adf875sg9h85sgh';


	public static function login($login, $password)
	{

		$sql = new SQL();

		$result = $sql->select("SELECT * FROM tb_users u INNER JOIN tb_persons p USING(idperson) WHERE u.deslogin = :LOGIN", array(':LOGIN' => $login));





		if (count($result) == 0) {
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


	public static function checkErrorLogin()
	{
		if (isset($_SESSION['msg_error'])){
			if ($_SESSION['msg_error']['count'] === 0) {
				$_SESSION['msg_error']['count']++;
			} else {
				unset($_SESSION['msg_error']);
			}
		}
	}

	public static function verifyLogin($idAdmin = true)
	{

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

	public static function logout()
	{
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

	public function createUser()
	{

		$deslogin = $_POST['deslogin'];
		$desemail = strtolower($_POST['desemail']);
		$desperson = strtoupper($_POST['desperson']);
		$despassword = $_POST['despassword'];
		$nrphone = $_POST['nrphone'];
		$inadmin = $_POST['inadmin'];

		$this->verifyEmailValid($desemail);

		$checkUserExists = User::checkUserExists($deslogin , $desemail);

		if ($checkUserExists['status'] == false) {
			throw new \Exception($checkUserExists['message'], $checkUserExists['code_error']);			
		} else {		

			$sql = new Sql();

			$password = password_hash($despassword, PASSWORD_DEFAULT, ['coast' => 12]);

			$sql->query("CALL sp_users_save(:desperson, :deslogin, :despassword, :desemail, :nrphone, :inadmin)", array(
				":desperson" => $desperson,
				":deslogin" => $deslogin,
				":despassword" => $password,
				":desemail" => $desemail,
				":nrphone" => $nrphone,
				":inadmin" => $inadmin
			));
		}

	}

	public function verifyEmailValid($email)
	{
		if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
			throw new \Exception("Email invalido.", 3);
		}
	}

	public function get($iduser)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_users u INNER JOIN tb_persons p USING(idperson) WHERE u.iduser = :iduser", array(':iduser' => $iduser));

		$this->setData($results[0]);

	}

	public function update($iduser)
	{

		$deslogin = $_POST['deslogin'];
		$desemail = strtolower($_POST['desemail']);
		$desperson = strtoupper($_POST['desperson']);
		$nrphone = $_POST['nrphone'];
		$inadmin = $_POST['inadmin'];

		$this->verifyEmailValid($desemail);

		$checkUpdateData = User::checkUpdateUserExists($deslogin, $desemail, $iduser);

		if ($checkUpdateData['status'] == false) {
			throw new \Exception($checkUpdateData['message'], $checkUpdateData['code_error']);	
		} else {

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

	}

	public function delete($iduser)
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_userspasswordsrecoveries WHERE iduser = :iduser", array(':iduser' => $iduser));

		$sql->query("CALL sp_users_delete(:iduser)", array(':iduser' => $iduser));

	}

	public static function checkUserExists($login, $email)
	{

		$sql = new Sql();

		$check_login = $sql->select("SELECT COUNT(*) AS 'CHECKLOGIN' FROM tb_users WHERE deslogin = '{$login}'");
		$check_email = $sql->select("SELECT COUNT(*) AS 'CHECKEMAIL' FROM tb_persons WHERE desemail = '{$email}'");

		if ($check_login[0]['CHECKLOGIN'] > 0) {
			$array_check_login = array(
				'message' => "Nome de usuário já existente",
				'code_error' => 1,
				'status' => false
			);
			return $array_check_login;

		} else if ($check_email[0]['CHECKEMAIL'] > 0) {
			$array_check_email = array(
				'message' => "E-mail já cadastrado",
				'code_error' => 2,
				'status' => false
			);
			return $array_check_email;

		} else {
			$array_check_confirm = array(
				'message' => "Usuário Cadastrado com sucesso!",
				'status' => true
			);
			return $array_check_confirm;

		}	

	}

	public static function checkUpdateUserExists($login, $email, $iduser)
	{

		$sql = new Sql();

		$check_login = $sql->select("SELECT COUNT(*) AS 'CHECKLOGIN' FROM tb_users WHERE deslogin = '{$login}' AND iduser != {$iduser}");

		$check_email = $sql->select("SELECT COUNT(*) AS 'CHECKEMAIL' FROM tb_persons p INNER JOIN tb_users u USING(idperson) WHERE p.desemail = '{$email}' AND u.iduser != {$iduser}");

		if ($check_login[0]['CHECKLOGIN'] > 0) {
			$array_check_login = array(
				'message' => "Nome de usuário já existente",
				'code_error' => 1,
				'status' => false
			);
			return $array_check_login;

		} else if ($check_email[0]['CHECKEMAIL'] > 0) {
			$array_check_email = array(
				'message' => "E-mail já cadastrado",
				'code_error' => 2,
				'status' => false
			);
			return $array_check_email;

		} else {
			$array_check_confirm = array(
				'message' => "Usuário Cadastrado com sucesso!",
				'status' => true
			);
			return $array_check_confirm;

		}	

	}


	public static function getForgot($email)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_persons p INNER JOIN tb_users u USING(idperson) WHERE p.desemail = :email", array(':email' => $email));

		if (count($results) == 0) {
			exit;					
		}

		else {

			$data = $results[0];

			$results2 = $sql->select("CALL sp_userspasswordsrecoveries_create(:iduser, :desip)", array(
				':iduser' => $data["iduser"],
				':desip' => $_SERVER['REMOTE_ADDR']
			));

			if (count($results2) == 0) {
				exit;
			}

			else {

				$dataRecovery = $results2[0];

				$code = base64_encode(openssl_encrypt(
					$dataRecovery['idrecovery'],
					'AES-256-CBC',
					User::SECRET_KEY,
					OPENSSL_RAW_DATA,
					User::SECRET_IV
				));

				$link = \Ecommerce\Config::getWwwroot() . "/admin/forgot/reset?code={$code}";

				$mailer = new \Ecommerce\Mailer(
					$data['desemail'],
					$data['desperson'],
					'Redefinição de senha',
					'view'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'email',
					'forgot.html',
					array(
						'NAME_USER' => $data['desperson'],
						'LINK' => $link
					),
					array(
						'view/admin/email/images/image-0.png' => 'image-0',
						'view/admin/email/images/image-1.png' => 'image-1',
						'view/admin/email/images/image-2.png' => 'image-2',
						'view/admin/email/images/image-3.png' => 'image-3',
						'view/admin/email/images/image-4.png' => 'image-4',		
						'view/admin/email/images/image-6.png' => 'image-6',
						'view/admin/email/images/image-7.png' => 'image-7',
						'view/admin/email/images/image-8.png' => 'image-8'
					)
				);

				$mailer->send();

				return $data;

			}			
		}
	}

	public static function validPassword($password1, $password2)
	{

		if ($password1 != $password2) {
			throw new \Exception("A senha precisa ser igual nos dois campos");

		} else{

			return $password1;

		}

	}



	public static function validForgotDecrypt($code)
	{
		$idrecovery = openssl_decrypt(
			base64_decode($code),
			'AES-256-CBC',
			User::SECRET_KEY,
			OPENSSL_RAW_DATA,
			User::SECRET_IV
		);

		$sql = new Sql();

		$results = $sql->select("SELECT *, a.dtregister AS LAST_REGISTER FROM tb_userspasswordsrecoveries a INNER JOIN tb_users b USING(iduser) INNER JOIN tb_persons c USING(idperson) WHERE a.idrecovery = :idrecovery AND a.dtrecovery IS NULL AND DATE_ADD(a.dtregister, INTERVAL 1 HOUR) >= NOW()", array(
			":idrecovery"=>$idrecovery
		));


		if (count($results) == 0) {
			throw new \Exception("Este link de redefinição de senha expirou");

		} 

		$results2 = $sql->select("SELECT MAX(a.dtregister) AS LAST_LINK FROM tb_userspasswordsrecoveries a INNER JOIN tb_users b USING(iduser) INNER JOIN tb_persons c USING(idperson) WHERE b.iduser = :iduser AND a.dtrecovery IS NULL AND DATE_ADD(a.dtregister, INTERVAL 1 HOUR) >= NOW()", array(
			':iduser' => $results[0]['iduser']));

		$results3 = $sql->select("SELECT MAX(a.idrecovery ) AS LAST_IDRECOVERY FROM tb_userspasswordsrecoveries a INNER JOIN tb_users b USING(iduser) INNER JOIN tb_persons c USING(idperson) WHERE b.iduser = :iduser AND DATE_ADD(a.dtregister, INTERVAL 1 HOUR) >= NOW()", array(
			':iduser' => $results[0]['iduser']));

		if ($results[0]['LAST_REGISTER'] == $results2[0]['LAST_LINK'] && $results[0]['idrecovery'] == $results3[0]['LAST_IDRECOVERY']){
			return $results[0];						

		} else {
			throw new \Exception("Foi gerado um link de redefinição de senha mais recentes que este");

		}	

	}


	public function setPassword($password, $iduser)
	{
		$sql = new Sql();

		$sql->query("UPDATE tb_users SET despassword = :password WHERE iduser = :iduser" , array(
			':password' => $password,
			':iduser' => $iduser
		));

	}


	public static function setForgotUsed($idrecovery)
	{
		$sql = new Sql();

		$sql->query("UPDATE tb_userspasswordsrecoveries SET dtrecovery = NOW() WHERE idrecovery = :idrecovery", array(
			":idrecovery"=>$idrecovery
		));

	}

	public static function setCacheData(array $data_form)
	{	
		$data[] = $data_form;

		foreach ($data[0] as $key => $value) {
			setcookie($key, $value, time()+1);
		}

		return $data;
	}

	public static function checkErrorSave()
	{
		if (isset($_SESSION['msg_error_create'])){
			if ($_SESSION['msg_error_create']['count'] === 0) {
				$_SESSION['msg_error_create']['count']++;
			} else {
				unset($_SESSION['msg_error_create']);
			}
		}
	}

}

?>