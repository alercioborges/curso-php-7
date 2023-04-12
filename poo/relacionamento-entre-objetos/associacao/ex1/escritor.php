<?php

class Escritor{

	private $name;
	private $pencil;

	public function getName() {
		return $this->name;
	}

	public function setName($nameEscritor) {
		return $this->name = $nameEscritor;
	}

	public function setPencil(Caneta $pencilEscritor) {
		return $this->pencil = $pencilEscritor;
	}

	public function getPencil() {
		return $this->pencil;
		//para ter o retrono tem que chamar tbm
		//uma função ou atributo do objeto
	}

}

?>