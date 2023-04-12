<?php

include_once 'class_pessoa.php';

class Usuario extends Pessoa {

	private $idnumber;
	private $perfil;

	public function getIdnumber() {    
		return $this->idnumber;
	}

	public function setIdnumber($idnumber) {
		$this->idnumber = $idnumber;
	}

	public function getPerfil() {    
		return $this->perfil;
	}

	public function setPerfil($perfil) {
		$this->perfil = $perfil;
	}

	public function setNomeUsuario($nome) {
		$this->nome = $nome;
	}

}

?>