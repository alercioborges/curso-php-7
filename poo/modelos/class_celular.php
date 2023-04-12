<?php

include_once 'class_produto.php';

class Celular extends Produto{

	private $modelo;
	private $fabricante;
	private $ano;

	public function setModelo($modeloCelular){
		return $this->modelo = $modeloCelular;
	}

	public function getModelo(){
		return $this->modelo;
	}

	public function setFabricante($fabricanteCelular){		
		return $this->fabricante = $fabricanteCelular;
	}

	public function getfabricante(){
		return $this->fabricante;
	}

	public function setAno($anoCelular){
		return $this->ano = $anoCelular;
	}

	public function getAno(){
		return $this->ano;
	}

}

?>