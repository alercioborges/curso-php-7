<?php

class Nome {

	public function serParam($param){
		$this->serParam = $param;
		return $this->serParam;
	}

	public function setNome($nome){
		$exibeNome = "O nome é " . $nome;
		return $exibeNome;
	}

}

$nome = new Nome();

$meuNome = $nome->serParam("Alercio Silva");

echo $nome->setNome($meuNome);

?>