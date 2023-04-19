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


}


?>