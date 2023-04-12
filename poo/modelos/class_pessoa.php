<?php 

class Pessoa{

	protected $nome;
	protected $cpf;
	protected $email;

	public function getNome() {
		return $this->nome;
	}

	public function setNome($nome) {
		$this->name = $nome;
	}

	public function getCPF() {
		return $this->cpf;
	}

	public function setCPF($cpf) {
		$this->cpf = $cpf;
	}

	public function getEmail() {
		return $this->email;
	}

	public function setEmail($email) {
		$this->email = $email;
	}

}

?>