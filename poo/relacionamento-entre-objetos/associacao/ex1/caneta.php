<?php

class Caneta {

	private $name;

	public function setName(string $nameCaneta) {
		return $this->name = $nameCaneta;
	}

	public function getName() {
		return $this->name;
	}

	public function write() {
		echo "A caneta {$this->name} está escrevendo";
	}


}

?>