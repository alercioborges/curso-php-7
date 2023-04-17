<?php

require_once("Veiculo.php");

class Carro extends Veiculo{

	private $placa;
	private $modelo;
	private $ano;

	public function setPlaca($placaCarro){
		$this->placa = $placaCarro;
	}

	public function getPlaca(){
		return $this->placa;
	}

	public function setModelo($modeloCarro){
		$this->modelo = $modeloCarro;
	}

	public function getModelo(){
		return $this->modelo;
	}

	public function setAno($anoCarro){
		$this->ano = $anoCarro;
	}

	public function getAno(){
		return $this->ano;
	}	

}

?>