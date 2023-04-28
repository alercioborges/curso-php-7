<?php

class Usuario {

	private $id;
	private $username;
	private $email;
	private $firstname;
	private $lastname;
	private $pass;
	private $created;
	private $edited;

	public function setId($value){
		$this->id = $value;
	}

	public function setUsername($value){
		$this->username = $value;
	}

	public function setEmail($value){
		$this->email = $value;
	}

	public function setFirstname($value){
		$this->firstname = $value;
	}

	public function setLastname($value){
		$this->lastname = $value;
	}

	public function setPass($value){
		$this->pass = $value;
	}

	public function setCreated($value){
		$this->created = $value;
	}

	public function setEdited($value){
		$this->edited = $value;
	}

	public function getId(){
		return $this->id;
	}

	public function getUsername(){
		return $this->username;
	}

	public function getEmail(){
		return $this->email;
	}

	public function getFirstname(){
		return $this->firstname;
	}

	public function getLastname(){
		return $this->lastname;
	}

	public function getPass(){
		return $this->pass;
	}

	public function getCreated(){
		return $this->created;
	}

	public function getEdited(){
		return $this->edited;
	}

	/*******************************/

	//Método que carrega os dados da tebela 'tb_user'--
	//--referente a um usuário especifícado via 'id' passado por parametro 
	public function loadById($id){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_user WHERE id = :ID", array(":ID" => $id));

		//Verif. se existe se existe daos na variavel 'results'
		if (count($results) > 0) { 

			//variavel 'row' sendo array e recebendo os dados do array de $results
			$row = $results[0];

			$this->setId($row['id']);
			$this->setUsername($row['username']);
			$this->setEmail($row['email']);
			$this->setFirstname($row['firstname']);
			$this->setLastname($row['lastname']);
			$this->setPass($row['pass']);
			$this->setCreated(new DateTimeImmutable($row['created']));
			$this->setEdited(new DateTimeImmutable($row['edited']));

		} else {
			echo "Não há usuário cadastrado com o ID informado";
		}
	}

	//Retornando a chamada da classe uma string com os dados do usuário
	//--especifícado via 'id' passado por parametro no método 'loadById'
	public function __toString(){

		return json_encode(array(
			"id" => $this->getId(),
			"username" => $this->getUsername(),
			"email" => $this->getEmail(),
			"firstname" => $this->getFirstname(),
			"lastname" => $this->getLastname(),
			"pass" => $this->getPass(),
			"created" => $this->getCreated()->format("d-m-Y H:i:s"),
			"edited" => $this->getEdited()->format("d-m-Y H:i:s")

		));
	}

	//Método estático--
	//--(ñ precisa instanciar a classe onde o método foi implem. para utiliza-lo)
	//Pode ser estático pois ñ utiliza a referencia '$this'
	public static function getList(){
		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_user ORDER BY id");

	}

	public static function searchUserByUsername($username){
		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_user WHERE username LIKE :USERNAME ORDER BY firstname",
			array(':USERNAME' => "%" . $username . "%"
		));
	}

	public function login($username, $pass){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_user WHERE "
			. "username = :USERNAME AND pass = :PASS", array(
				":USERNAME" => $username,
				":PASS" => $pass
			));

		if (count($results) > 0) { 

			//variavel 'row' sendo array e recebendo os dados do array de $results
			$row = $results[0];

			$this->setId($row['id']);
			$this->setUsername($row['username']);
			$this->setEmail($row['email']);
			$this->setFirstname($row['firstname']);
			$this->setLastname($row['lastname']);
			$this->setPass($row['pass']);
			$this->setCreated(new DateTime($row['created']));
			$this->setEdited(new DateTime($row['edited']));

		} else {
			echo "Usuário e/ou senha incorreto";
		}
	}

	public static function searchUserByEmail($email){

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_user WHERE email = :ENAIL",
			array(':ENAIL' => $email));
	}


	public function setData($data){

		$this->setId($data['id']);
		$this->setUsername($data['username']);
		$this->setEmail($data['email']);
		$this->setFirstname($data['firstname']);
		$this->setLastname($data['lastname']);
		$this->setPass($data['pass']);
		$this->setCreated(new DateTime($data['created']));
		$this->setEdited(new DateTime($data['edited']));

	}

	public function insert(){

		$sql = new Sql();

		$checkUser = Usuario::checkUserExists($this->getUsername(), $this->getEmail());

		if($checkUser['status'] == false){
			echo $checkUser['message'] . "<br><br>";

		} else{
			$results = $sql->select("CALL sp_user_insert(:USERNAME, :EMAIL, :FIRSTNAME, :LASTNAME, :PASS)", array(
				":USERNAME" => $this->getUsername(),
				":EMAIL" => $this->getEmail(),
				":FIRSTNAME" => $this->getFirstname(),
				":LASTNAME" => $this->getLastname(),
				":PASS" => $this->getPass()
			));

			if (count($results) > 0) {
				$this->setData($results[0]);

			}

			echo $checkUser['message'] . "<br><br>";

		}

	}

	public function update($username, $email, $firstname, $lastname, $pass){

		$sql = new Sql();

		//Subistituido os dados do usuario pelos passado por parametro
		$this->setUsername($username);
		$this->setEmail($email);
		$this->setFirstname($firstname);
		$this->setLastname($lastname);
		$this->setPass($pass);

		$checkUser = Usuario::checkUserExists($this->getUsername(), $this->getEmail());

		if($checkUser['status'] == false){
			echo $checkUser['message'] . "<br><br>";

		} else{
			$sql->setQuery("UPDATE tb_user SET username = :USERNAME, email = :EMAIL, firstname = :FIRSTNAME, lastname = :LASTNAME, pass = :PASS, edited = NOW() WHERE id = :ID", array(
				':USERNAME' => $this->getUsername(),
				':EMAIL' => $this->getEmail(),
				':FIRSTNAME' => $this->getFirstname(),
				':LASTNAME' => $this->getLastname(),
				':PASS' => $this->getPass(),
				':ID' => $this->getId()
			));

			echo "Cadastro de usuário alterado com sucesso!<br><br>";

		}

	}

	public static function checkUserExists($username, $email){

		$sql = new Sql();

		$check_username = $sql->select("SELECT COUNT(*) AS 'CHECKUSERNAME' FROM tb_user WHERE username = '{$username}'");
		$check_email = $sql->select("SELECT COUNT(*) AS 'CHECKEMAIL' FROM tb_user WHERE email = '{$email}'");

		if ($check_username[0]['CHECKUSERNAME'] > 0) {
			$array_check_username = array(
				'message' => "Nome de usuário já existente",
				'status' => false
			);
			return $array_check_username;

		} else if ($check_email[0]['CHECKEMAIL'] > 0) {
			$array_check_email = array(
				'message' => "E-mail já cadastrado",
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
}

?>